@extends('layouts.dashboard')
@if (session('message'))
    @section('alert')
    <div class="row" id="proBanner">
        <div class="col-12">
            <span class="d-flex align-items-center purchase-popup">
            <p>{{ session('message') }}</p>
            <i class="mdi mdi-close ml-auto" id="bannerClose"></i>
            </span>
        </div>
    </div>
    @endsection
@endif
@section('breadcumb')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-clipboard-account"></i>
        </span> Pendaftaran
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
        {{-- <h4 class="card-title">Pendaftaran</h4> --}}
        <div class="table-responsive">
        <table class="table" id="datatables" style="width: 100%">
            <thead>
            <tr>
                <th> Nama </th>
                <th> Email </th>
                <th> No (WA) </th>
                <th> Foto </th>
                <th> Bukti Transfer </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $atlit)
                <tr>
                    <td>{{ $atlit->nama }}</td>
                    <td>{{ $atlit->email }}</td>
                    <td>{{ $atlit->telp }}</td>
                    <td><img src="{{asset('storage/upload/img/atlit/'.$atlit->foto)}}" alt="image"></td>
                    {{-- <td><img src="{{asset('storage/upload/img/bukti/'.$atlit->bukti)}}" alt="image"></td> --}}
                    <td><a class="btn btn-info btn-sm" href="{{asset('storage/upload/img/bukti/'.$atlit->bukti)}}" target="_blank">Lihat Bukti Transfer</a></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('pendaftaran.detail', ['id' => $atlit->id])}}">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Data tidak ditemukan</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection