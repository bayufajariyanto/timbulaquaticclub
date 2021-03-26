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
            <i class="mdi mdi-textbox-password"></i>
        </span> Ubah Password
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
        <form action="{{ route('akun.updatepassword') }}" method="POST">
            @csrf                        
            <div class="form-group">
                <label for="nama">Password Lama</label>
                <input type="password" class="form-control" id="nama" name="passwordlama" placeholder="Password lama anda">
            </div>                                       
            <div class="form-row">             
                <div class="form-group col-md-6">
                  <label for="password">Password Baru</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="repassword">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Password">
                </div>
            </div>                                        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>        
    </div>
</div>
    </div>
</div>
@endsection