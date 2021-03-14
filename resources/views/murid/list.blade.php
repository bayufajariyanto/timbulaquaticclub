@extends('layouts.dashboard')
@section('breadcumb')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple"></i>
        </span> List Murid
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
        <table class="table">
            <thead>
            <tr>
                <th> Email </th>
                <th> Nama </th>
                <th> Nomor HP (WA) </th>
                <th> Foto </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> Email@gmail.com </td>
                <td>David Grey</td>
                <td>
                086127363
                </td>
                <td> <img src="{{asset('assets/images/faces/face1.jpg')}}" class="mr-2" alt="image"> </td>
                <td> <a class="btn btn-info btn-sm" href="#">Detail</a> </td>
            </tr>
            <tr>
                <td> Email@gmail.com </td>
                <td>Stella Johnson</td>
                <td>
                086127363
                </td>
                <td> <img src="{{asset('assets/images/faces/face2.jpg')}}" class="mr-2" alt="image"> </td>
                <td> <a class="btn btn-info btn-sm" href="#">Detail</a> </td>
            </tr>
            <tr>
                <td> Email@gmail.com </td>
                <td>Marina Michel</td>
                <td>
                086127363
                </td>
                <td> <img src="{{asset('assets/images/faces/face3.jpg')}}" class="mr-2" alt="image"> </td>
                <td> <a class="btn btn-info btn-sm" href="#">Detail</a> </td>
            </tr>
            <tr>
                <td> Email@gmail.com </td>
                <td>John Doe</td>
                <td>
                086127363
                </td>
                <td> <img src="{{asset('assets/images/faces/face4.jpg')}}" class="mr-2" alt="image"> </td>
                <td> <a class="btn btn-info btn-sm" href="#">Detail</a> </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection