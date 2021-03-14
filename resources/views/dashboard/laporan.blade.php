@extends('layouts.dashboard')
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                            <div class="py-2 mr-3">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('laporan.store') }}" method="POST">
                            @csrf
                            <div class="modal-body bg-white">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="DD-MM-YYYY">
                                </div>                                       
                                <div class="form-group">
                                    <label for="murid">Nama Murid</label>                                    
                                    <select class="form-control" id="murid" name="idmurid">
                                        <option value="1">David Grey</option>
                                        <option value="2">Stella Johnson</option>
                                        <option value="3">Marian Michel</option>
                                        <option value="4">Jon Doe</option>
                                        <option value="5">David Monroe</option>
                                    </select>
                                    {{-- <input type="text" class="form-control" id="murid" name="email" placeholder="Email"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                                </div>                                       
                                <div class="form-group">
                                    <label for="gaya">Gaya</label>
                                    <select class="form-control" id="gaya" name="gaya">
                                        <option value="1">Free Style (Bebas)</option>
                                        <option value="2">Breaststroke (Dada)</option>            
                                        <option value="3">Backstroke (Punggung)</option>
                                        <option value="4">Butterfly (Kupu-Kupu)</option>
                                        <option value="5">Gaya Ganti</option>
                                        <option value="6">Surface</option>
                                        <option value="7">Biffins</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomor">Nomor</label>
                                    <select class="form-control" id="nomor" name="nomor">
                                        <option value="1">100 M</option>
                                        <option value="2">200 M</option>            
                                        <option value="3">400 M</option>
                                        <option value="4">800 M</option>
                                        <option value="5">1500 M</option>
                                    </select>
                                </div>
                                <div class="form-row">             
                                    <div class="form-group col-md-3">
                                      <label for="jam">Jam</label>
                                      <input type="number" class="form-control" id="jam" name="jam" placeholder="00">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="menit">Menit</label>
                                      <input type="number" class="form-control" id="menit" name="menit" placeholder="00">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="detik">Detik</label>
                                      <input type="number" class="form-control" id="detik" name="detik" placeholder="00">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="milidetik">Milidetik</label>
                                      <input type="number" class="form-control" id="milidetik" name="milidetik" placeholder="00">
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
                <th> Assignee </th>
                <th> Subject </th>
                <th> Status </th>
                <th> Last Update </th>
                <th> Tracking ID </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                <img src="{{asset('assets/images/faces/face1.jpg')}}" class="mr-2" alt="image"> David Grey
                </td>
                <td> Fund is not recieved </td>
                <td>
                <label class="badge badge-gradient-success">DONE</label>
                </td>
                <td> Dec 5, 2017 </td>
                <td> WD-12345 </td>
                <td> <a href="{{route('laporan.detail')}}" class="btn btn-sm btn-info">Detail</a> </td>
            </tr>
            <tr>
                <td>
                <img src="{{asset('assets/images/faces/face2.jpg')}}" class="mr-2" alt="image"> Stella Johnson
                </td>
                <td> High loading time </td>
                <td>
                <label class="badge badge-gradient-warning">PROGRESS</label>
                </td>
                <td> Dec 12, 2017 </td>
                <td> WD-12346 </td>
                <td> <a href="{{route('laporan.detail')}}" class="btn btn-sm btn-info">Detail</a> </td>
            </tr>
            <tr>
                <td>
                <img src="{{asset('assets/images/faces/face3.jpg')}}" class="mr-2" alt="image"> Marina Michel
                </td>
                <td> Website down for one week </td>
                <td>
                <label class="badge badge-gradient-info">ON HOLD</label>
                </td>
                <td> Dec 16, 2017 </td>
                <td> WD-12347 </td>
                <td> <a href="{{route('laporan.detail')}}" class="btn btn-sm btn-info">Detail</a> </td>
            </tr>
            <tr>
                <td>
                <img src="{{asset('assets/images/faces/face4.jpg')}}" class="mr-2" alt="image"> John Doe
                </td>
                <td> Loosing control on server </td>
                <td>
                <label class="badge badge-gradient-danger">REJECTED</label>
                </td>
                <td> Dec 3, 2017 </td>
                <td> WD-12348 </td>
                <td> <a href="{{route('laporan.detail')}}" class="btn btn-sm btn-info">Detail</a> </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection