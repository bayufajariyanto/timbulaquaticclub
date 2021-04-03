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
            <i class="mdi mdi-file-document"></i>
        </span> List Rapor
    </h3>    
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">        
        <div class="table-responsive">
            <table class="table" id="datatables">
                <thead>
                <tr>
                    <th> ID </th>
                    <th> Nama </th>
                    <th> Jenis Kelamin </th>
                    <th> Program </th>
                    <th> Aksi </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($data as $atlit)                    
                <tr>
                    <td>{{$atlit->id_atlit}}</td>
                    <td>
                        <img src="{{asset('storage/upload/img/atlit/'.$atlit->foto)}}" alt="image"> &nbsp; {{$atlit->name}}
                    </td>
                    <td> {{$atlit->jenis_kelamin == "laki" ? "Laki - Laki" : "Perempuan"}} </td>
                    <td>
                    <label class="badge badge-gradient-info">{{$atlit->program}}</label>
                    </td>                    
                    <td> <a class="btn btn-sm btn-primary" href="{{route('rapor.detail', ['id' => $atlit->id_atlit])}}">Detail</a> </td>
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