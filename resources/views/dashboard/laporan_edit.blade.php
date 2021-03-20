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
        </span> <a href="{{route('laporan.list')}}">Laporan</a> / Edit
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                {{-- <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> --}}
                <!-- Button trigger modal -->                
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
            <div class="col-md-12">                
                <form action="{{ route('laporan.update') }}" method="POST" id="inputnilai">
                    @csrf
                    <div class="modal-body bg-white">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$data['tanggal']}}" placeholder="DD-MM-YYYY" required>
                        </div>                                       
                        <div class="form-group">
                            <label for="murid">Nama Murid</label>
                            <select class="form-control" id="murid" name="idmurid" required>
                                @foreach ($atlit as $a)                                            
                                    <option value="{{$a->id}}" {{($data['id_atlit'] == $a->id) ? 'selected' : ''}}>{{$a->nama}}</option>
                                @endforeach                                        
                            </select>
                            {{-- <input type="text" class="form-control" id="murid" name="email" placeholder="Email"> --}}
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$data['keterangan']}}" placeholder="Keterangan" required>
                        </div>                                       
                        <div class="form-group">                            
                            <label for="gaya">Gaya</label>
                            <select class="form-control" id="gaya" name="gaya" required>
                                <option value="Free Style (Bebas)" {{($data['gaya'] == 'Free Style (Bebas)') ? 'selected' : ''}}>Free Style (Bebas)</option>
                                <option value="Breaststroke (Dada)" {{($data['gaya'] == 'Breaststroke (Dada)') ? 'selected' : ''}}>Breaststroke (Dada)</option>            
                                <option value="Backstroke (Punggung)" {{($data['gaya'] == 'Backstroke (Punggung)') ? 'selected' : ''}}>Backstroke (Punggung)</option>
                                <option value="Butterfly (Kupu-Kupu)" {{($data['gaya'] == 'Butterfly (Kupu-Kupu)') ? 'selected' : ''}}>Butterfly (Kupu-Kupu)</option>
                                <option value="Gaya Ganti" {{($data['gaya'] == 'Gaya Ganti') ? 'selected' : ''}}>Gaya Ganti</option>
                                <option value="Surface" {{($data['gaya'] == 'Surface') ? 'selected' : ''}}>Surface</option>
                                <option value="Biffins" {{($data['gaya'] == 'Biffins') ? 'selected' : ''}}>Biffins</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <select class="form-control" id="nomor" name="nomor" required>
                                <option value="100 M">100 M</option>
                                <option value="200 M">200 M</option>            
                                <option value="400 M">400 M</option>
                                <option value="800 M">800 M</option>
                                <option value="1500 M">1500 M</option>
                            </select>
                        </div>
                        <div class="form-row">             
                            @php
                                $arraywaktu = explode("'",$data['waktu']);                                
                            @endphp
                            <div class="form-group col-md-3">
                              <label for="jam">Jam</label>
                              <input type="number" min="0" class="form-control" id="jam" name="jam" placeholder="00" value="{{$arraywaktu[0]}}" onchange="zeroLeading(this)" onClick="this.select();">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="menit">Menit</label>
                              <input type="number" min="0" max="59" class="form-control" id="menit" name="menit" placeholder="00" value="{{$arraywaktu[1]}}" onchange="zeroLeading(this)" onClick="this.select();">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="detik">Detik</label>
                              <input type="number" min="0" max="59" class="form-control" id="detik" name="detik" placeholder="00" value="{{$arraywaktu[2]}}" onchange="zeroLeading(this)" onClick="this.select();">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="milidetik">Milidetik</label>
                              <input type="number" min="0" max="99" class="form-control" id="milidetik" name="milidetik" placeholder="00" value="{{$arraywaktu[3]}}" onchange="zeroLeading(this)" onClick="this.select();">
                            </div>
                        </div>                
                        {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
                        <input type="hidden" name="idlaporan" value="{{$data['id']}}">                        
                        <button type="submit" class="btn btn-sm btn-gradient-success"><span class="mdi mdi-content-save"> Simpan</span></button>
                    </div>                    
                </form>
            </div>
        </div>        
    </div>
    </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    function zeroLeading(input) {    
        if(parseInt(input.value,10)<10 && input.value.length === 1)input.value='0'+input.value;
        if(input.value == '')input.value='00';
    }    
</script>
@endsection