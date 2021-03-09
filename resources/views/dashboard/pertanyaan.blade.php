@extends('layouts.dashboard')
@section('breadcumb')
<span class="page-title-icon bg-gradient-primary text-white mr-2">
    <i class="mdi mdi-message"></i>
</span> Pertanyaan
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
                <th> Tanggal </th>
                <th> Nama </th>
                <th> Email </th>
                <th> Nomor HP (WA) </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> Dec 5, 2017 </td>
                <td>
                <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> David Grey
                </td>
                <td> Fund is not recieved </td>
                <td>
                <label class="badge badge-gradient-success">DONE</label>
                </td>
                <td> WD-12345 </td>
            </tr>
            <tr>
                <td> Dec 12, 2017 </td>
                <td>
                <img src="assets/images/faces/face2.jpg" class="mr-2" alt="image"> Stella Johnson
                </td>
                <td> High loading time </td>
                <td>
                <label class="badge badge-gradient-warning">PROGRESS</label>
                </td>
                <td> WD-12346 </td>
            </tr>
            <tr>
                <td> Dec 16, 2017 </td>
                <td>
                <img src="assets/images/faces/face3.jpg" class="mr-2" alt="image"> Marina Michel
                </td>
                <td> Website down for one week </td>
                <td>
                <label class="badge badge-gradient-info">ON HOLD</label>
                </td>
                <td> WD-12347 </td>
            </tr>
            <tr>
                <td> Dec 3, 2017 </td>
                <td>
                <img src="assets/images/faces/face4.jpg" class="mr-2" alt="image"> John Doe
                </td>
                <td> Loosing control on server </td>
                <td>
                <label class="badge badge-gradient-danger">REJECTED</label>
                </td>
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