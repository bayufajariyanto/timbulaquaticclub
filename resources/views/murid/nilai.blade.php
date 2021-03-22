@extends('layouts.dashboard')
@section('breadcumb')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-chart-bar"></i>
        </span> Rapor
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
                <p>{{ucfirst($atlit[0]->nama)}}</p>
                <p>{{$atlit[0]->tahun_masuk}}</p>
                <p>{{ucfirst($pelatih->name)}} <span class="badge badge-gradient-primary">{{($pelatih->roles == 'Admin') ? 'Coach' : 'Super Admin'}}</span></p>            
            <div class="table-responsive mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th rowspan="5" class="align-middle"> GAYA </th>
                        <th rowspan="5" class="align-middle"> NOMOR </th>                        
                    </tr>             
                    <tr>
                        @foreach ($tahun as $data)
                            <th colspan="{{$data->jumlah}}">{{$data->tahun}}</th>
                        @endforeach
                    </tr>       
                    <tr>
                        @foreach ($bulan as $data)
                            <th colspan="{{$data->jumlah}}">{{$data->bulan}}</th>
                        @endforeach
                    </tr>       
                    <tr>
                        @foreach ($laporan as $item)
                        <th>{{$item->tanggal}}</th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($laporan as $item)
                        <th class="text-wrap">{{$item->keterangan}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                            $currentidgayas = 0;                            
                            $is_show = false; // true e mek pas ndek nomor 100 m tok
                            for ($i=0; $i < count($nomors); $i++) { 
                                if ($i == 0) {
                                    $currentidgayas = $nomors[$i]->id_gayas;
                                    $is_show = true;                                    
                                    $currentindex = $i;
                                    while ($currentindex < count($nomors)) {                                        
                                        if ($currentidgayas == $nomors[$currentindex]->id_gayas) {
                                            $count++;                                            
                                        }
                                        $currentindex++;
                                    }                                    
                                } else {
                                    if ($currentidgayas != $nomors[$i]->id_gayas) {
                                        $currentidgayas = $nomors[$i]->id_gayas;
                                        $is_show = true;   
                                        $count=0;                                 
                                        $currentindex = $i;
                                        while ($currentindex < count($nomors)) {                                        
                                            if ($currentidgayas == $nomors[$currentindex]->id_gayas) {
                                                $count++;                                                
                                            }
                                            $currentindex++;
                                        }
                                    } else {
                                        $is_show = false;
                                    }
                                }                                
                        @endphp
                                <tr>
                                    @if ($is_show)
                                        <td rowspan="{{$count}}" class="text-wrap">{{$nomors[$i]->nama_gayas}}</td>
                                    @endif
                                    <td>{{$nomors[$i]->nama_nomors}}</td>
                                    @foreach ($laporan as $item)
                                        <td>{{(($item->id_nomor == $nomors[$i]->id_nomors) ? $item->waktu : '')}}</td>
                                    @endforeach
                                </tr>
                        @php
                            }                            
                        @endphp                                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection