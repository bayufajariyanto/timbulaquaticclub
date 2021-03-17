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
                'riwayat.*' => 'required',
                'alasan.*' => 'required',
            ]
        );
        if ($validators->fails()) {
            return response(['error' => $validators->errors(), 'Validation Error']);
        }

        $data = $request->all();

        // dd($data);
        for ($i=0; $i < sizeof($data['email']); $i++) {             
            echo "Email : ".$data['email'][$i]."\n";
            echo "Nama : ".$data['nama'][$i]."\n";
            echo "Telp : ".$data['telp'][$i]."\n";
            echo "Tanggal Lahir : ".$data['tanggal_lahir'][$i]."\n";
            echo "Alamat : ".$data['alamat'][$i]."\n";
            echo "Jenis Kelamin : ".$data['jenis_kelamin'][$i]."\n";
            echo "Pelatih : ".$data['pelatih'][$i]."\n";
            $files = $data['foto'][$i];
            $custom_filename = time().'-'.$files->getClientOriginalName();
            $filesbukti = $data['bukti'][$i];
            $custombukti = time().'-'.$filesbukti->getClientOriginalName();
            echo "Foto : ".$custom_filename."\n";
            echo "Bukti : ".$custombukti."\n";
            echo "Riwayat : \n";
            $riwayat = json_decode($data['riwayat'][$i]);
            foreach ($riwayat as $data) {
                echo "- ".$data."\n";
            }
            echo "Alasan : ".$data['alasan'][$i]."\n";
            echo "------------------------\n";            
        }

        // for ($i=0; $i < sizeof($data['email']); $i++) { 
        //     // storage engine
        //     $foto = $data['foto'][$i];
        //     $custom_filename = time().'-'.$foto->getClientOriginalName();
        //     $foto->storeAs('public/upload/img/', $custom_filename);       
        //     $bukti = $data['bukti'][$i];
        //     $custom_buktiname = time().'-'.$bukti->getClientOriginalName();
        //     $bukti->storeAs('public/upload/img/', $custom_buktiname);       
        //     $student = Student::create([
        //         'email' => $data['email'][$i],
        //         'nama' => $data['nama'][$i],
        //         'telp' => $data['telp'][$i],
        //         'tanggal_lahir' => $data['tanggal_lahir'][$i],
        //         'alamat' => $data['alamat'][$i],
        //         'jenis_kelamin' => $data['jenis_kelamin'][$i],
        //         'pelatih' => $data['pelatih'][$i],
        //         'foto' => $custom_filename,
        //         'bukti' => $custom_buktiname,
        //         'riwayat' => $data['riwayat'][$i],
        //         'alasan' => $data['alasan'][$i]
        //     ]);
        // }


        // return response(['data' => $data]);        
        // return csrf_token();
        return response(['status' => 200, 'message' => 'Upload successfully'], 200);
    }
}
