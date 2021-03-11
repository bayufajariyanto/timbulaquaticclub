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
</span> <a href="{{ route('akun.list') }}">List Akun</a> / Edit
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">                                    
        <form action="{{ route('akun.update') }}" method="POST">
            @csrf            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="name" value="{{$user->name}}" placeholder="Nama">
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
                    <option value="Admin" {{ ($user->roles == 'Admin') ? 'selected' : '' }}>Admin</option>
                    <option value="Super Admin" {{ ($user->roles == 'Super Admin') ? 'selected' : '' }}>Super Admin</option>            
                </select>
            </div>
            <input type="hidden" name="id" value="{{$user->id}}">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>        
    </div>
</div>
    </div>
</div>
@endsection