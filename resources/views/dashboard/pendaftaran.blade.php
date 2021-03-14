@extends('layouts.dashboard')
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
        <h4 class="card-title">Recent Tickets</h4>
        <div class="table-responsive">
        <table class="table">
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
            <tr>
                <td> David Grey </td>
                <td> david@gmail.com </td>
                <td> 08277366 </td>
                <td> <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="image"> </td>
                <td> 
                    <a class="btn btn-info btn-sm" href="#">Lihat Bukti Transfer</a>     
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('pendaftaran.detail', ['id' => 1])}}">Detail</a>
                </td>
            </tr>
            <tr>
                <td> Stella Johnson </td>
                <td> Stella@gmail.com </td>
                <td> 08277366 </td>
                <td> <img src="{{asset('assets/images/faces/face2.jpg')}}" alt="image"> </td>
                <td> 
                    <a class="btn btn-info btn-sm" href="#">Lihat Bukti Transfer</a>     
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('pendaftaran.detail', ['id' => 1])}}">Detail</a>
                </td>
            </tr>
            <tr>
                <td> Marina Michel </td>
                <td> marina@gmail.com </td>
                <td> 08277366 </td>
                <td> <img src="{{asset('assets/images/faces/face3.jpg')}}" alt="image"> </td>
                <td> 
                    <a class="btn btn-info btn-sm" href="#">Lihat Bukti Transfer</a>     
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('pendaftaran.detail', ['id' => 1])}}">Detail</a>
                </td>
            </tr>
            <tr>
                <td> John Doe </td>
                <td> john@gmail.com </td>
                <td> 08277366 </td>
                <td> <img src="{{asset('assets/images/faces/face4.jpg')}}" class="mr-2" alt="image"> </td>
                <td> 
                    <a class="btn btn-info btn-sm" href="#">Lihat Bukti Transfer</a>     
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('pendaftaran.detail', ['id' => 1])}}">Detail</a>
                </td>
            </tr>            
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection