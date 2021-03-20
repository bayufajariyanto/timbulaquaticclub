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
        </span> Laporan
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                {{-- <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Nilai
                </button>
                
                <!-- Modal -->                
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                            <div class="py-2 mr-3">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>                        
                        <form action="{{ route('laporan.store') }}" method="POST" id="inputnilai">
                            @csrf
                            <div class="modal-body bg-white">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="DD-MM-YYYY" required>
                                </div>                                       
                                <div class="form-group">
                                    <label for="murid">Nama Murid</label>
                                    <select class="form-control" id="murid" name="idmurid" required>
                                        @foreach ($atlit as $a)                                            
                                            <option value="{{$a->id}}">{{$a->nama}}</option>
                                        @endforeach                                        
                                    </select>
                                    {{-- <input type="text" class="form-control" id="murid" name="email" placeholder="Email"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                                </div>                                       
                                <div class="form-group">
                                    <label for="gaya">Gaya</label>
                                    <select class="form-control" id="gaya" name="gaya" required>
                                        <option value="Free Style (Bebas)">Free Style (Bebas)</option>
                                        <option value="Breaststroke (Dada)">Breaststroke (Dada)</option>            
                                        <option value="Backstroke (Punggung)">Backstroke (Punggung)</option>
                                        <option value="Butterfly (Kupu-Kupu)">Butterfly (Kupu-Kupu)</option>
                                        <option value="Gaya Ganti">Gaya Ganti</option>
                                        <option value="Surface">Surface</option>
                                        <option value="Biffins">Biffins</option>
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
                                    <div class="form-group col-md-3">
                                      <label for="jam">Jam</label>
                                      <input type="number" min="0" class="form-control" id="jam" name="jam" placeholder="00" value="00" onchange="zeroLeading(this)" onClick="this.select();">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="menit">Menit</label>
                                      <input type="number" min="0" max="59" class="form-control" id="menit" name="menit" placeholder="00" value="00" onchange="zeroLeading(this)" onClick="this.select();">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="detik">Detik</label>
                                      <input type="number" min="0" max="59" class="form-control" id="detik" name="detik" placeholder="00" value="00" onchange="zeroLeading(this)" onClick="this.select();">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="milidetik">Milidetik</label>
                                      <input type="number" min="0" max="99" class="form-control" id="milidetik" name="milidetik" placeholder="00" value="00" onchange="zeroLeading(this)" onClick="this.select();">
                                    </div>
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
        {{-- <h4 class="card-title">Recent Tickets</h4> --}}
        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th> Tanggal </th>
                <th> Atlit </th>
                <th> Keterangan </th>
                <th> Gaya </th>
                <th> Nomor </th>
                <th> Waktu </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $laporan)                
                <tr>
                    <td>{{$laporan->tanggal}}</td>
                    <td>{{$laporan->name}}</td>
                    <td>{{$laporan->keterangan}}</td>
                    <td>{{$laporan->gaya}}</td>
                    <td>{{$laporan->nomor}}</td>
                    <td>{{$laporan->waktu}}</td>
                    {{-- <td> <a href="{{route('laporan.detail')}}" class="btn btn-sm btn-info">Detail</a> </td> --}}
                    <td> 
                        <a href="{{route('laporan.edit', ['id' => $laporan->id])}}" class="btn btn-sm btn-info">Edit</a> 
                        <a href="{{route('laporan.destroy', ['id' => $laporan->id])}}" class="btn btn-sm btn-danger">Delete</a>
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
@section('footer')
<script>
    function zeroLeading(input) {    
        if(parseInt(input.value,10)<10 && input.value.length === 1)input.value='0'+input.value;
        if(input.value == '')input.value='00';
    }    
</script>
@endsection