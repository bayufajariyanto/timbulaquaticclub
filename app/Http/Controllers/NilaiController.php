<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function nilai(){
        $id = Auth::id();
        $laporan = Laporan::where('id_atlit', $id)->orderBy('tanggal')->get();        
        if (count($laporan) > 0) {            
            $id_pelatih = $laporan[$laporan->count()-1]->id_pelatih;
            $pelatih = User::find($id_pelatih);
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
            
            $atlit = DB::table('users as u')
                ->select('s.nama', DB::raw('YEAR(u.created_at) as tahun_masuk'))
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
    
            $data = Student::where('email', auth()->user()->email)->get();        
            $img = $data[0]->foto;        
            
            return view('murid.nilai', ['laporan' => $laporan, 'pelatih' => $pelatih, 'atlit' => $atlit, 'nomors' => $nomors, 'tahun' => $tahun, 'bulan' => $bulan])->with('img', $img);
        } else {            
            $nomors = [];
            $tahun = [];
            $bulan = [];
            $pelatih = [];
            $atlit = DB::table('users as u')
                ->select('s.nama', DB::raw('YEAR(u.created_at) as tahun_masuk'))
                ->join('students as s', 'u.email', '=', 's.email')
                ->where('u.id', $id)
                ->get();            
            $data = Student::where('email', auth()->user()->email)->get();        
            $img = $data[0]->foto;        
            
            return view('murid.nilai', ['laporan' => $laporan, 'pelatih' => $pelatih, 'atlit' => $atlit, 'nomors' => $nomors, 'tahun' => $tahun, 'bulan' => $bulan])->with('img', $img);
        }
    }

    public function biodata()
    {        
        $user = Auth::user();
        $result = Student::where('email', $user->email)->get();
        $data = Student::find($result[0]->id);
        $img = $result[0]->foto;

        return view('dashboard.detail_pendaftaran', ['data' => $data])->with('img', $img);
    }
}