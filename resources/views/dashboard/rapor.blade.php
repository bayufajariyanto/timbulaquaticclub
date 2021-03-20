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
            <table class="table">
                <thead>
                <tr>
                    <th> Assignee </th>
                    <th> Subject </th>
                    <th> Status </th>
                    <th> Last Update </th>
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
                    <td> <a class="btn btn-sm btn-primary" href="{{route('rapor.detail', ['id' => 1])}}">Detail</a> </td>
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
                    <td> <a class="btn btn-sm btn-primary" href="{{route('rapor.detail', ['id' => 1])}}">Detail</a> </td>
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
                    <td> <a class="btn btn-sm btn-primary" href="{{route('rapor.detail', ['id' => 1])}}">Detail</a> </td>
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
                    <td> <a class="btn btn-sm btn-primary" href="{{route('rapor.detail', ['id' => 1])}}">Detail</a> </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection