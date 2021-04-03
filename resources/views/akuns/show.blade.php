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
        </span> List Akun
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                {{-- <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Akun
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                            <div class="py-2 mr-3">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('akun.store') }}" method="POST">
                            @csrf
                            <div class="modal-body bg-white">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="name" placeholder="Nama">
                                </div>                                       
                                <div class="form-row">             
                                    <div class="form-group col-md-6">
                                      <label for="password">Password</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="repassword">Konfirmasi Password</label>
                                      <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Password">
                                    </div>
                                </div>                
                                <div class="form-group">
                                    <label for="roles">Roles</label>
                                    <select class="form-control" id="roles" name="roles">
                                        <option value="Admin">Coach</option>
                                        <option value="Super Admin">Super Admin</option>            
                                    </select>
                                </div>
                                {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Simpan Akun</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
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
                    @if($u->email != $email)
                    <tr>
                        <td>{{ $no++ }}</td>                                                
                        <td>{{ $u->email }}</td>                        
                        <td>{{ $u->name }}</td>                        
                        <td><span class="badge badge-primary">{{ ($u->roles == "Admin") ? 'Coach' : 'Super Admin' }}</span></td>
                        <td class="text-right"> 
                            <a class="btn btn-info btn-sm" href="{{route('akun.edit', ['id' =>  $u->id])}}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{route('akun.hapus', ['id' => $u->id])}}">Hapus</a>
                        </td>
                    </tr>
                    @endif
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