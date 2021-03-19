@extends('layouts.dashboard')
@section('breadcumb')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-clipboard-account"></i>
        @if (!$data->isapproved)            
            </span> <a href="{{ route('pendaftaran.index') }}">Pendaftaran</a>
        @else
            </span> <a href="{{ route('murid.list') }}">List Atlit</a>
        @endif
         / Detail
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
            <div class="col-md-12">
                <a href="{{ url()->previous() }}" class="btn btn-gradient-info btn-sm">
                    <span class="mdi mdi-keyboard-backspace"> Kembali</span>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                <h4 class="card-title">Biodata</h4>
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP (WA)</th>
                        <td>{{$data->telp}}</td>
                    </tr>
                    <tr>
                      <th>Tanggal lahir</th>
                        <td>{{$data->tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{$data->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{$data->alamat}}</td>
                    </tr>
                    <tr>
                        <th>Riwayat Gangguan Tertentu</th>
                        <td>{{$data->riwayat}}</td>
                    </tr>
                </table>                                                
                <h4 class="card-title mt-5">Paket</h4>
                <table class="table">
                    <tr>
                        <th>Program</th>
                        <td>{{$data->program}}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Beli</th>
                        <td>{{$data->jumlah}}</td>
                    </tr>
                    <tr>
                        <th>Pelatih</th>
                        <td>{{$data->pelatih}}</td>
                    </tr>
                    <tr>
                        <th>Alasan Belajar Renang</th>
                        <td>{{$data->alasan}}</td>
                    </tr>                    
                </table>
                <h5 class="mt-5">
                    Bukti Transfer
                </h5>
                <img src="{{asset('storage/upload/img/bukti/'.$data->bukti)}}" class="img-thumbnail" alt="image"><br>
                <a class="btn btn-gradient-info btn-sm mt-2" href="{{asset('storage/upload/img/bukti/'.$data->bukti)}}" target="_blank"><span class="mdi mdi-image-filter-none">&nbsp;&nbsp;Lihat di Tab Baru</span></a><br>                
                @if (!$data->isapproved)                    
                <h4 class="card-title mt-5">Aksi</h4>                
                <a class="btn btn-gradient-success" href="{{route('pendaftaran.acc', ['id' => $data->id])}}">
                    <span class="mdi mdi-content-save"> Terima</span>
                </a>
                <a class="btn btn-gradient-danger" href="{{route('pendaftaran.destroy', ['id' => $data->id])}}">
                    <span class="mdi mdi-delete"> Tolak</span>
                </a>
                @endif
            </div>
            <div class="col-md-4 mb-5">            
                <img src="{{asset('storage/upload/img/atlit/'.$data->foto)}}" class="img-thumbnail mr-2" alt="image">
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