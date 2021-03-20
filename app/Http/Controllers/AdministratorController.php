<?php

namespace App\Http\Controllers;

use App\Laporan;
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

        return redirect()->route('pertanyaan')->with('message', 'Berhasil menghapus pertanyaan');
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
                    'l.gaya', 
                    'l.nomor', 
                    'l.waktu'
                )
                ->join('users as u', 'l.id_atlit', '=', 'u.id')
                ->get();
        return view('dashboard.laporan', ['atlit' => $atlit, 'data' => $data]);
    }

    public function detail_laporan()
    {
        return view('dashboard.detail_laporan');
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
        $laporan->gaya = $data['gaya'];
        $laporan->nomor = $data['nomor'];
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
            return view('dashboard.laporan_edit', ['atlit' => $atlit, 'data' => $data]);
        }
        
        public function update_laporan(Request $request)
        {
            $data = $request->all();
            $waktu = $data['jam']."'".$data['menit']."'".$data['detik']."'".$data['milidetik'];
            
            $laporan = Laporan::find($data['idlaporan']);
            $laporan->id_atlit = $data['idmurid'];
            $laporan->tanggal = $data['tanggal'];
            $laporan->keterangan = $data['keterangan'];
            $laporan->gaya = $data['gaya'];
            $laporan->nomor = $data['nomor'];
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
