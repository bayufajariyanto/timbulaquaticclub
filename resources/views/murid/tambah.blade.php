@extends('layouts.dashboard')
@section('breadcumb')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple-plus"></i>
        </span> Tambah Atlit
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
        <h4 class="card-title">Recent Tickets</h4>
        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th> Assignee </th>
                <th> Subject </th>
                <th> Status </th>
                <th> Last Update </th>
                <th> Tracking ID </th>
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
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection