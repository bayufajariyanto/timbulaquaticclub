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
            <i class="mdi mdi-account-multiple"></i>
        </span> List Atlit
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
        {{-- <h4 class="card-title">Recent Tickets</h4> --}}
        <div class="table-responsive">
        <table class="table" id="datatables">
            <thead>
            <tr>
                <th> No </th>
                <th> Email </th>
                <th> Nama </th>
                <th> Nomor HP (WA) </th>
                <th> Foto </th>
                <th> Dibuat Oleh </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
                @php
                    $id = 1;
                @endphp
                @forelse ($data as $atlit)                    
                    <tr>
                        <td> {{$id++}}</td>
                        <td> {{$atlit->email}} </td>
                        <td> {{ucfirst($atlit->nama)}} </td>
                        <td> {{$atlit->telp}} </td>
                        <td> <img src="{{asset('storage/upload/img/atlit/'.$atlit->foto)}}" class="mr-2" alt="image"> </td>
                        <td> {{ucfirst($atlit->approver)}} </td>
                        <td> 
                            <a class="btn btn-info btn-sm" href="{{route('murid.detail', ['id' => $atlit->id])}}">Detail</a> 
                            <a class="btn btn-danger btn-sm" href="{{route('murid.destroy', ['id' => $atlit->id])}}">Hapus</a> 
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