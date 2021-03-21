<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\Console\Input\Input;

class LandingPage extends Controller
{
    public function __construct()
    {
        // $thisYear = 2020;
    }
    public function home(){
        $data = [
            'url' => 'beranda'
        ];
        return view('landing_page/index', $data);
    }
    public function daftar()
    {
        $data = [
            'url' => 'daftar'
        ];
        return view('landing_page.daftar', $data);
    }
    public function pelatih(){
        $data = [
            'url' => 'pelatih'
        ];
        return view('landing_page.pelatih', $data);
    }
    public function tentang(){
        $data = [
            'url' => 'tentang'
        ];
        return view('landing_page.tentang', $data);
    }
    public function lokasi(){
        $data = [
            'url' => 'lokasi'
        ];
        return view('landing_page.lokasi', $data);
    }
    public function simpandaftar(Request $request)
    {
        dd($request->all());
    }

    public function tanya(Request $request)
    {
        $data = $request->all();
        $tanggal = date('Y-m-d');
        Pertanyaan::create([
            'tanggal' => $tanggal,
            'nama' => $data['nama'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'pesan' => $data['pertanyaan']
        ]);

        return redirect(url('/').'#success')->with('message', 'Berhasil mengirimkan pertanyaan');
    }
}
