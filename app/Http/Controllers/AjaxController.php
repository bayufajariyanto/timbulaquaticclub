<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function tes()
    {
        return csrf_token();
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
                'bukti.*' => 'required|mimes:jpg,jpeg,png|max:2048',
                'riwayat.*' => 'required|string',                
                'alasan.*' => 'required|string',
            ]
        );
        if ($validators->fails()) {
            return response(['error' => $validators->errors(), 'Validation Error']);
        }

        $data = $request->all();

        // dd($data);
        // for ($i=0; $i < sizeof($data['email']); $i++) { 
        //     echo "Email : ".$data['email'][$i]."<br>";
        //     echo "Nama : ".$data['nama'][$i]."<br>";
        //     echo "Telp : ".$data['telp'][$i]."<br>";
        //     echo "Tanggal Lahir : ".$data['tanggal_lahir'][$i]."<br>";
        //     echo "Alamat : ".$data['alamat'][$i]."<br>";
        //     echo "Jenis Kelamin : ".$data['jenis_kelamin'][$i]."<br>";
        //     echo "Pelatih : ".$data['pelatih'][$i]."<br>";
        //     $files = $data['foto'][$i];
        //     $custom_filename = time().'-'.$files->getClientOriginalName();
        //     $files = $data['bukti'][$i];
        //     $custombukti = time().'-'.$files->getClientOriginalName();
        //     echo "Foto : ".$custom_filename."<br>";
        //     echo "Foto : ".$custombukti."<br>";
        //     echo "Riwayat : ".$data['riwayat'][$i]."<br>";
        //     echo "Alasan : ".$data['alasan'][$i]."<br>";
        //     echo "<hr>";
        // }

        for ($i=0; $i < sizeof($data['email']); $i++) { 
            // storage engine
            $foto = $data['foto'][$i];
            $custom_filename = time().'-'.$foto->getClientOriginalName();
            $foto->storeAs('public/upload/img/', $custom_filename);       
            $bukti = $data['bukti'][$i];
            $custom_buktiname = time().'-'.$bukti->getClientOriginalName();
            $bukti->storeAs('public/upload/img/', $custom_buktiname);       
            $student = Student::create([
                'email' => $data['email'][$i],
                'nama' => $data['nama'][$i],
                'telp' => $data['telp'][$i],
                'tanggal_lahir' => $data['tanggal_lahir'][$i],
                'alamat' => $data['alamat'][$i],
                'jenis_kelamin' => $data['jenis_kelamin'][$i],
                'pelatih' => $data['pelatih'][$i],
                'foto' => $custom_filename,
                'bukti' => $custom_buktiname,
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
