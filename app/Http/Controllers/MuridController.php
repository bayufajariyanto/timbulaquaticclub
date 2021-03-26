<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $data = DB::table('students as s')
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
                    'u.name as approver',
                    's.program',
                    's.jumlah',
                    's.riwayat',
                    's.alasan'                    
                )
                ->join('users as u', 's.approvedby_id_user', '=', 'u.id')                
                ->where('s.isapproved', 1)
                ->get();                        
        return view('murid.list', ['data' => $data]);
    }    

    public function detail($id){
        $data = Student::find($id);
        return view('dashboard.detail_pendaftaran', ['data' => $data]);
    }

    public function destroy($id)
    {
        $student = Student::find($id);    
        // only delete table user and students
        // $res = User::where('email', $student->email)->delete();        
        // if ($res) {        
        //     $foto_path = storage_path('app/public/upload/img/atlit/'.$student->foto);
        //     $bukti_path = storage_path('app/public/upload/img/bukti/'.$student->bukti);
        //     if (File::exists($foto_path) && File::exists($bukti_path)) {
        //         File::delete([$foto_path, $bukti_path]);            
        //     }        
        //     $student->delete();        
        //     return redirect()->route('murid.list')->with('message', 'Berhasil menghapus akun Atlit');
        // } else {
        //     return redirect()->route('murid.list')->with('message', 'Terjadi kesalahan ketika menghapus Atlit');            
        // }
            
        // delete data from table user, student, and laporans, which is all data that linked with user data
        $user = User::where('email', $student->email)->get();                
        $reslaporan = Laporan::where('id_atlit', $user[0]->id)->get();
        foreach ($reslaporan as $data) {                
            $data->delete();
        }        
        $user[0]->delete();
        $foto_path = storage_path('app/public/upload/img/atlit/'.$student->foto);
        $bukti_path = storage_path('app/public/upload/img/bukti/'.$student->bukti);
        if (File::exists($foto_path) && File::exists($bukti_path)) {
            File::delete([$foto_path, $bukti_path]);            
        }        
        $student->delete();                 
        return redirect()->route('murid.list')->with('message', 'Berhasil menghapus akun Atlit');
    }
}
