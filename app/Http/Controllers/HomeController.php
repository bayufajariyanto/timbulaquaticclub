<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function pertanyaan()
    {
        return view('dashboard.pertanyaan');
    }

    public function laporan()
    {
        return view('dashboard.laporan');
    }

    public function pendaftaranpost(Request $request)
    {
        $validators = Validator::make($request->all(),
            [                             
                'email.*' => 'required|string',
                'nama.*' => 'required|string',
                'telp.*' => 'required|string',
                'tanggal_lahir.*' => 'required|string',
                'alamat.*' => 'required|string',
                'jenis_kelamin.*' => 'required|string',
                'pelatih.*' => 'required|string',
                'foto.*' => 'required|mimes:jpg,jpeg,png|max:2048',
                'riwayat.*' => 'required|string',                
                'alasan.*' => 'required|string',                
            ] 
        );
        if ($validators->fails()) {
            return response(['error' => $validators->errors(), 'Validation Error']);
        }

        $data = $request->all();        
        for ($i=0; $i < sizeof($data['email']); $i++) { 
            // echo "Email : ".$data['email'][$i]."<br>";
            // echo "Nama : ".$data['nama'][$i]."<br>";
            // echo "Telp : ".$data['telp'][$i]."<br>";
            // echo "Tanggal Lahir : ".$data['tanggal_lahir'][$i]."<br>";
            // echo "Alamat : ".$data['alamat'][$i]."<br>";
            // echo "Jenis Kelamin : ".$data['jenis_kelamin'][$i]."<br>";
            // echo "Pelatih : ".$data['pelatih'][$i]."<br>";
            // storage engine
            $files = $data['foto'][$i];
            $custom_filename = time().'-'.$files->getClientOriginalName();
            $files->storeAs('public/upload/img/', $custom_filename);
            // echo "Foto : ".$custom_filename."<br>";
            // echo "<img src='".asset('storage/upload/img/'.$custom_filename)."'>";
            // echo "Riwayat : ".$data['riwayat'][$i]."<br>";
            // echo "Alasan : ".$data['alasan'][$i]."<br>";
            // echo "<hr>";
            $student = Student::create([
                'email' => $data['email'][$i],
                'nama' => $data['nama'][$i],
                'telp' => $data['telp'][$i],
                'tanggal_lahir' => $data['tanggal_lahir'][$i],
                'alamat' => $data['alamat'][$i],
                'jenis_kelamin' => $data['jenis_kelamin'][$i],
                'pelatih' => $data['pelatih'][$i],
                'foto' => $custom_filename,
                'riwayat' => $data['riwayat'][$i],
                'alasan' => $data['alasan'][$i]
            ]);
        }


        // return response(['user' => $request]);
        // dd($request->tes);
        // return csrf_token();
        return response(['status' => 200, 'message' => 'Upload successfully'], 200);
    }
}
