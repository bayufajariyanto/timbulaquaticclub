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

    public function detail_price($id)
    {                
        $title = [
            '<span class="card-icon bg-gradient-primary text-white rounded-circle"><i class="mdi mdi-account-key"></i></span>  Paket Private',
            '<span class="card-icon bg-gradient-warning text-white rounded-circle"><i class="mdi mdi-trophy"></i></span> Kelas Prestasi',
            '<span class="card-icon bg-gradient-info text-white rounded-circle"><i class="mdi mdi-baby"></i></span>  Kelas Pemula',
            '<span class="card-icon bg-gradient-success text-white rounded-circle"><i class="mdi mdi-account-heart"></i></span>  Kelas Anak Berkebutuhan Khusus dan Terapi',            
        ];
        $harga = [
            '<span class="badge badge-info">IDR 750.000,00</span>',
            '<span class="badge badge-info">IDR 130.000,00</span>',
            '<span class="badge badge-info">IDR 150.000,00</span>',
            '<span class="badge badge-info">IDR 200.000,00</span>'
        ];
        $keterangan = [
            'Untuk jadwal bisa menyesuaikan dengan Pelatih',
            'Untuk murid baru atau anggota lama yang mau bergabung kembali wajib membayar biaya pendaftaran sebesar 50k<br>Jadwal akan disampaikan setelah mendaftar<br>',
            'Untuk murid baru wajib membayar biaya pendaftaran (50k)<br>Hari Minggu dan Senin pukul 06.00-07.30 AM',
            'Untuk jadwal bisa mneyesuaikan dengan Pelatih'
        ];
        $listisi = [
            [
                'Tiket kolam bayar sendiri di loket/kasir',
                'Pengantar yang menunggu <b>WAJIB</b> membayar tiket kolam',
                'Setiap pertemuan 1 jam pembelajaran',
                'Kolam renang Tirto Kencono, Katak Riang, dan kolam renang Millenium',
                '1 orang 11x pertemuan 750k',
                '2 orang 10x pertemuan 1.200k',
                '3 orang 10x pertemuan 1.800k'
            ],
            [
                '<b>WAJIB</b> bisa 4 gaya (Kupu, Punggung, Dada, dan Bebas)',
                'Untuk murid baru <b>WAJIB</b> membayar biaya pendaftaran (50k)',
                'Atlit dan pengantar yang menunggu <b>WAJIB</b> membayar tiket kolam',
                'Setiap pertemuan kurang lebih 1,5 jam pembelajaran',
                'Kolam renang Tirto Kencono dan Katak Riang'
            ],
            [
                '4x pertemuan sudah termasuk tiket kolam',
                'Untuk murid baru <b>WAJIB</b> membayar biaya pendaftaran 50k',
                'Pengantar yang menunggu <b>WAJIB</b> membayar tiket kolam',
                'Setiap pertemuan kurang lebih 1,5 jam pembelajaran',
                'Kolam renang Tirto Kencono dan Katak Riang'
            ],
            [
                '4x pertemuan <b>TIDAK</b> termasuk tiket kolam',
                'Pengantar yang menunggu <b>WAJIB</b> membayar tiket kolam',
                'Setiap pertemuan kurang lebih 1,5 jam pembelajaran',
                'Kolam renang Tirto Kencono dan Katak Riang'
            ]
        ];
        return view('landing_page.price', ['url' => 'detailharga', 'title' => $title[$id], 'harga' => $harga[$id], 'keterangan' => $keterangan[$id], 'listisi' => $listisi[$id]]);
    }
}
