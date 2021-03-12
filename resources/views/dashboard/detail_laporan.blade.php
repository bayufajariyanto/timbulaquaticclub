@extends('layouts.dashboard')
@section('breadcumb')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-file-document"></i>
        </span> Laporan / Detail
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
            <h4 class="card-title">Rapor</h4>
            <p>DIMAS ADJI FITRIAN WIBAWA</p>
            <p>18022310</p>
            <p>21/10/2007</p>
            <p>2007</p>
            <p>Laki-laki</p>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="4" class="align-center text-center">Gaya</th>
                        <th rowspan="4" class="align-center text-center">Nomor</th>
                        <th colspan="4" class="align-center text-center">Bulan</th>
                    </tr>
                    <tr>
                        <th class="align-center text-center">JUNI</th>
                        <th class="align-center text-center">JULI</th>
                        <th class="align-center text-center">AGUSTUS</th>
                    </tr>
                    <tr>
                        <th class="align-center text-center">24</th>
                        <th class="align-center text-center">24</th>
                        <th class="align-center text-center">24</th>
                    </tr>
                    <tr>
                        <th class="align-center text-center">TEST PSK</th>
                        <th class="align-center text-center">TES SAIGON</th>
                        <th class="align-center text-center">TES PSK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>FREE STYLE (BEBAS)</td>
                        <td>50 M</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                    </tr>
                    <tr>
                        <td>BREASTSTROKE (DADA)</td>
                        <td>50 M</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                    </tr>
                    <tr>
                        <td>BACKSTROKE (PUNGGUNG)</td>
                        <td>50 M</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                    </tr>
                    <tr>
                        <td>BUTTERFLY (KUPU-KUPU)</td>
                        <td>50 M</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                    </tr>
                    <tr>
                        <td>GAYA GANTI</td>
                        <td>50 M</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                    </tr>
                    <tr>
                        <td>SURFACE</td>
                        <td>50 M</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                    </tr>
                    <tr>
                        <td>BIFFINS</td>
                        <td>50 M</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                        <td>00.32.33</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection