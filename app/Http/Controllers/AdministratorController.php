<?php

namespace App\Http\Controllers;

use App\Gaya;
use App\Laporan;
use App\Nomor;
use App\Pertanyaan;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (Gate::allows('manage-administration')) return $next($request);
            abort(403,'Anda tidak memiliki cukup hak akses');
        });
    }

    public function pendaftaran()
    {
        $data = Student::where('isapproved',0)            
            ->get();
        return view('dashboard.pendaftaran', ['data' => $data]);
    }

    public function detail_pendaftaran($id)
    {
        $data = Student::find($id);
        return view('dashboard.detail_pendaftaran', ['data' => $data]);
    }

    public function acc_pendaftaran($id)
    {
        $data = Student::find($id);        
        
        $user = new User();
        $user->name = $data->nama;
        $user->email = $data->email;
        $user->password = Hash::make($data->telp);
        $user->roles = "Student";
        $user->save();

        $data->isapproved = 1;
        $data->approvedby_id_user = Auth::id();
        $data->save();

        return redirect()->route('pendaftaran.index')->with('message', 'Berhasil menerima pendaftaran');
    }
    
    public function destroy_pendaftaran($id)
    {
        $data = Student::find($id);        
        $foto_path = storage_path('app/public/upload/img/atlit/'.$data->foto);
        $bukti_path = storage_path('app/public/upload/img/bukti/'.$data->bukti);
        if (File::exists($foto_path) && File::exists($bukti_path)) {
            File::delete([$foto_path, $bukti_path]);            
        }        
        $data->delete();
        
        return redirect()->route('pendaftaran.index')->with('message', 'Berhasil menghapus pendaftaran');
    }

    public function pertanyaan()
    {
        $data = Pertanyaan::all();        
        return view('dashboard.pertanyaan', ['data' => $data]);
    }

    public function destroy_pertanyaan($id)
    {
        $data = Pertanyaan::find($id);
        $data->delete();

        return redirect()->route('pertanyaan.list')->with('message', 'Berhasil menghapus pertanyaan');
    }

    public function laporan()
    {
        $atlit = DB::table('users as u')
                ->select(
                    'u.id',                    
                    's.nama'                     
                )
                ->join('students as s', 'u.email', '=', 's.email')
                ->get();
        $data = DB::table('laporans as l')
                ->select(
                    'l.id',
                    'l.tanggal', 
                    'u.name',
                    'l.keterangan', 
                    'g.nama as gaya', 
                    'n.nama as nomor', 
                    'l.waktu'
                )
                ->join('users as u', 'l.id_atlit', '=', 'u.id')
                ->join('gayas as g', 'l.id_gaya', '=', 'g.id')
                ->join('nomors as n', 'l.id_nomor', '=', 'n.id')
                ->get();        
        $gaya = Gaya::all();
        $nomor = Nomor::where('id_gaya', 1)->get();
        return view('dashboard.laporan', ['atlit' => $atlit, 'data' => $data, 'gaya' => $gaya, 'nomor' => $nomor]);
    }
    
    public function rapor()
    {
        // select u.id, u.name, s.foto, s.jenis_kelamin from laporans l join users u on l.id_atlit=u.id 
        // join students s on u.email = s.email group by l.id_atlit;
        $data = DB::table('laporans as l')
            ->select(
                'u.id as id_atlit',
                'u.name',
                's.foto',
                's.jenis_kelamin',
                's.program'
            )
            ->join('users as u', 'l.id_atlit', '=', 'u.id')
            ->join('students as s', 'u.email', '=', 's.email')
            ->distinct('l.id_atlit')
            ->get();
        // dd($data);
        return view('dashboard.rapor', ['data' => $data]);
    }

    public function detail_rapor($id)
    {
        $laporan = Laporan::where('id_atlit', $id)->orderBy('tanggal')->get();
        $id_pelatih = $laporan[$laporan->count()-1]->id_pelatih;
        
        $tahun = DB::table('laporans')
            ->select(
                DB::raw('year(tanggal) as tahun'),
                DB::raw('count(id) jumlah')
            )
            ->where('id_atlit', $id)
            ->groupBy(DB::raw('year(tanggal)'))            
            ->get();
        
        $bulan = DB::table('laporans')
            ->select(
                DB::raw('monthname(tanggal) as bulan'),
                DB::raw('count(id) jumlah')
            )
            ->where('id_atlit', $id)
            ->groupBy(DB::raw('year(tanggal)'))
            ->groupBy(DB::raw('monthname(tanggal)'))
            ->get();        
        
        $pelatih = User::find($id_pelatih);                
        $atlit = DB::table('users as u')
            ->select(
                's.nama',
                'u.id',
                's.tanggal_lahir',
                DB::raw('YEAR(u.created_at) as tahun_masuk'),
                's.jenis_kelamin',
                's.foto'
            )
            ->join('students as s', 'u.email', '=', 's.email')
            ->where('u.id', $id)
            ->get();                
        $nomors = DB::table('nomors as n')
            ->select(
                'n.id as id_nomors',
                'n.nama as nama_nomors',
                'g.id as id_gayas',
                'g.nama as nama_gayas'
            )
            ->join('gayas as g', 'n.id_gaya', '=', 'g.id')
            ->orderBy('n.id_gaya')
            ->orderBy('n.id')
            ->get();        
        return view('dashboard.detail_rapor', ['laporan' => $laporan, 'pelatih' => $pelatih, 'atlit' => $atlit, 'nomors' => $nomors, 'tahun' => $tahun, 'bulan' => $bulan]);
    }

    public function store_laporan(Request $request)
    {
        // dd($request->all());        
        $data = $request->all();
        $idpelatih = Auth::id();
        $waktu = $data['jam']."'".$data['menit']."'".$data['detik']."'".$data['milidetik'];
        $laporan = new Laporan();
        $laporan->id_pelatih = $idpelatih;
        $laporan->id_atlit = $data['idmurid'];
        $laporan->tanggal = $data['tanggal'];
        $laporan->keterangan = $data['keterangan'];
        $laporan->id_gaya = $data['gaya'];
        $laporan->id_nomor = $data['nomor'];
        $laporan->waktu = $waktu;
        $laporan->save();

        return redirect()->route('laporan.list')->with('message', 'Berhasil menambahkan nilai');
    }    
    
    public function edit_laporan($id)
    {
        $atlit = DB::table('users as u')
            ->select(
                'u.id',                    
                's.nama'                     
                )
                ->join('students as s', 'u.email', '=', 's.email')
                ->get();
        $data = Laporan::find($id);
        $gaya = Gaya::all();
        $nomor = Nomor::where('id_gaya', $data->id_gaya)->get();        
        return view('dashboard.laporan_edit', ['atlit' => $atlit, 'data' => $data, 'gaya' => $gaya, 'nomor' => $nomor]);
    }
        
    public function update_laporan(Request $request)
    {
        $data = $request->all();
        $waktu = $data['jam']."'".$data['menit']."'".$data['detik']."'".$data['milidetik'];
        
        $laporan = Laporan::find($data['idlaporan']);
        $laporan->id_atlit = $data['idmurid'];
        $laporan->tanggal = $data['tanggal'];
        $laporan->keterangan = $data['keterangan'];
        $laporan->id_gaya = $data['gaya'];
        $laporan->id_nomor = $data['nomor'];
        $laporan->waktu = $waktu;
        $laporan->save();

        return redirect()->route('laporan.list')->with('message', 'Berhasil mengubah data nilai');
    }

    public function destroy_laporan($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();
        
        return redirect()->route('laporan.list')->with('message', 'Berhasil menghapus data nilai');        
    }
}
