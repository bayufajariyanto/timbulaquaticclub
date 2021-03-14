@extends('layouts.dashboard')
@section('breadcumb')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-message"></i>
        </span> Pertanyaan
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
        {{-- <h4 class="card-title">Recent Tickets</h4> --}}
        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th> Tanggal </th>
                <th> Nama </th>
                <th> Email </th>
                <th> Nomor HP (WA) </th>
                <th> Pesan </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> Dec 5, 2017 </td>
                <td>David Grey</td>
                <td>emal@gmail.com</td>
                <td>0827265</td>
                <td> Fund is not recieved </td>
                <td>                     
                    <a class="btn btn-danger btn-sm" href="#">Delete</a> 
                </td>
            </tr>
            <tr>
                <td> Dec 12, 2017 </td>
                <td> Stella Johnson</td>
                <td>emal@gmail.com</td>
                <td>0827265</td>
                <td> High loading time </td>
                <td>                     
                    <a class="btn btn-danger btn-sm" href="#">Delete</a> 
                </td>
            </tr>
            <tr>
                <td> Dec 16, 2017 </td>
                <td> Marina Michel</td>
                <td>emal@gmail.com</td>
                <td>0827265</td>
                <td> Website down for one week </td>
                <td>                     
                    <a class="btn btn-danger btn-sm" href="#">Delete</a> 
                </td>
            </tr>        
            <tr>
                <td> Dec 3, 2017 </td>
                <td> John Doe</td>
                <td>emal@gmail.com</td>
                <td>0827265</td>
                <td> Loosing control on server </td>
                <td>                     
                    <a class="btn btn-danger btn-sm" href="#">Delete</a> 
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