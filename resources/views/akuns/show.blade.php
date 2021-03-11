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
<span class="page-title-icon bg-gradient-primary text-white mr-2">
    <i class="mdi mdi-file-document"></i>
</span> List Akun
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">        
        <div class="table-responsive">
        <table class="table" id="datatables" style="width: 100%">
            <thead>
            <tr>
                <th> No </th>                
                <th> Email </th>
                <th> Nama </th>
                <th> Role </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp                
                @forelse ($user as $u)
                    <tr>
                        <td>{{ $no++ }}</td>                                                
                        <td>{{ $u->email }}</td>                        
                        <td>{{ $u->name }}</td>                        
                        <td><span class="badge badge-primary">{{ $u->roles }}</span></td>
                        <td> 
                            <a class="btn btn-info btn-sm" href="{{route('akun.edit', ['id' =>  $u->id])}}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{route('akun.hapus', ['id' => $u->id])}}">Hapus</a>
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