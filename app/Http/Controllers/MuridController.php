<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class MuridController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-student')) return $next($request);
            abort(403, 'Anda tidak memiliki akses');
        });
    }

    public function list(){        
        $data = DB::table('users as u')
                ->select(
                    's.id',
                    's.email',
                    's.nama', 
                    's.telp', 
                    's.tanggal_lahir', 
                    's.alamat', 
                    's.jenis_kelamin', 
                    's.pelatih', 
                    's.foto', 
                    's.bukti',
                    's.program',
                    's.jumlah',
                    's.riwayat',
                    's.alasan'
                )
                ->join('students as s', 'u.email', '=', 's.email')
                ->get();                
        return view('murid.list', ['data' => $data]);
    }    

    public function detail($id){
        $data = Student::find($id);
        return view('dashboard.detail_pendaftaran', ['data' => $data]);
    }
}
