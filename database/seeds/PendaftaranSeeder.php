<?php

use App\Student;
use Illuminate\Database\Seeder;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar = new Student();
        $daftar->email = "tes@gmail.com";
        $daftar->nama = "tes";
        $daftar->telp = "0765454678";
        $daftar->tanggal_lahir = "2000-10-17";
        $daftar->alamat = "Dukuh Pamotan RT 02 RW 01, Pamotan, Kec. Dampit";
        $daftar->jenis_kelamin = "laki";
        $daftar->pelatih = "laki";
        $daftar->bukti = "1616052400-harry-knight-2YOYNT8Y-lE-unsplash.jpg";
        $daftar->foto = "1616052400-1fdf8700958eb3f75a6f9c28dcbb7f0a.jpg";
        $daftar->program = "Kelas Privat";
        $daftar->jumlah = "2 Orang - Rp 140K";
        $daftar->riwayat = "Paru";
        $daftar->alasan = "suka suka";
        $daftar->save();
        $daftar = new Student();
        $daftar->email = "asd@gmail.com";
        $daftar->nama = "asd";
        $daftar->telp = "098765";
        $daftar->tanggal_lahir = "2000-05-10";
        $daftar->alamat = "malang";
        $daftar->jenis_kelamin = "perempuan";
        $daftar->pelatih = "perempuan";
        $daftar->bukti = "1616052400-kenneth-mallia-FFu3-WGnas0-unsplash.jpg";
        $daftar->foto = "1616052400-5d9993f6d2cdebe3b25d932b09a8ba50.jpg";
        $daftar->program = "Kelas Privat";
        $daftar->jumlah = "2 Orang - Rp 140K";
        $daftar->riwayat = "Jantung, Paru, Otot";
        $daftar->alasan = "pengen aja";
        $daftar->save();
        $this->command->info("Pendaftaran berhasil ditambahkan!");
    }
}
