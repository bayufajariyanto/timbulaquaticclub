@extends('layouts.dashboard')
@section('breadcumb')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-clipboard-account"></i>
        </span> Pendaftaran / Detail
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                {{-- <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> --}}
            </li>
        </ul>
    </nav>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">        
        <div class="row">
            <div class="col-8">
                <h4 class="card-title">Biodata</h4>
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>John Doe</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>john@gmail.com</td>
                    </tr>
                    <tr>
                        <th>Nomor HP (WA)</th>
                        <td>08277366</td>
                    </tr>
                    <tr>
                      <th>Tanggal lahir</th>
                        <td>23/06/1976</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>Laki-laki</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>Malang</td>
                    </tr>
                    <tr>
                        <th>Riwayat Gangguan Tertentu</th>
                        <td>Jantung, Paru, Otot</td>
                    </tr>
                </table>                                                
                <h4 class="card-title mt-5">Paket</h4>
                <table class="table">
                    <tr>
                        <th>Program</th>
                        <td>Kelas Privat</td>
                    </tr>
                    <tr>
                        <th>Pelatih</th>
                        <td>Bebas</td>
                    </tr>
                    <tr>
                        <th>Alasan Belajar Renang</th>
                        <td>Ingin upgrade gaya renang, sebelumnya cuma bisa gaya batu</td>
                    </tr>
                    <tr>
                        <th>Bukti Transfer</th>
                        <td>
                            <a class="btn btn-info btn-sm" href="#">Lihat Bukti Transfer</a>
                        </td>
                    </tr>
                </table>
                <h4 class="card-title mt-5">Aksi</h4>                
                <a class="btn btn-success" href="#{{$id}}">Terima</a>
                <a class="btn btn-danger" href="#{{$id}}">Tolak</a>
            </div>
            <div class="col-4">
                <img src="{{asset('assets/images/faces/face4.jpg')}}" class="mr-2" alt="image">
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $(document).ready(function) {
        $("#statuspendaftaran").combobox({
            select: function (event, ui) {
                alert('the select event has fired!')
            }
        })
    }
</script>
@endsection