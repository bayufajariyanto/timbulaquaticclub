@extends('layout.landing_template')
@section('content')
<section class="container mt-5" style="height: 100%">
    @if (session('message'))        
        <div class="alert bg-gradient-success alert-dismissible fade show" role="alert">
            <font size="2">
            {{ session('message') }}
            {{-- Berhasil mendaftarkan akun --}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </font>
        </div>
    @endif    
    <form action="{{route('pendaftaran')}}" method="POST" ng-controller="controller" id="form" name="form" enctype="multipart/form-data">                        
        <div class="card shadow-sm mb-5">
            <div class="card-body">                                
                <h4 class="mb-5">Formulir Pendaftaran</h4>
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <select class="form-select" id="paket" name="paket" ng-model="form.paket"
                                ng-change="gantiProgram()">
                                    <option value="@{{ $index }}" ng-repeat="value in programs">@{{ value.nama }}</option>
                                </select>
                                <label for="paket">Pilih Program</label>
                            </div>
                            <div class="mb-5 highlight" ng-bind-html="programs[form.paket].desc | trustHtml"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <select class="form-select" id="orang" name="orang" ng-model="form.orang"
                                ng-change="gantiOrang()">
                                    <option value="@{{ value.jumlah }}" ng-repeat="value in jumlah[form.paket]">@{{ value.nama }}</option>
                                </select>
                                <label for="orang">Jumlah Orang</label>
                            </div>
                            <div class="mb-5 highlight" ng-bind-html="jumlah[form.paket][form.orang].desc | trustHtml"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div ng-repeat="row in jumlahorang">                                    
            <div class="card shadow-sm mb-4" ng-show="isForm">
                @csrf
                <div class="card-header">
                    <h4>Formulir Data Murid @{{ row+1 }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-5 form-floating">
                                <input type="email" class="form-control" id="email" ng-model="input[row].email" placeholder="nama@contoh.com" name="email[]">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="text" class="form-control" id="nama" ng-model="input[row].nama" placeholder="Nama Lengkap" name="nama[]">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="text" class="form-control" id="telp" ng-model="input[row].telp" placeholder="Nomor Telp." name="telp[]">
                                <label for="telp" class="form-label">Nomor Telepon/HP (WhatsApp)</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="date" class="form-control" id="tanggal_lahir" ng-model="input[row].tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir[]">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            </div>
                            <div class="form-floating mb-5">
                                <textarea class="form-control" placeholder="Alamat" id="alamat" ng-model="input[row].alamat" style="height: 100px" name="alamat[]"></textarea>
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="mb-5">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" ng-model="input[row].jenis_kelamin" id="laki@{{row}}" value="laki">
                                    <label class="form-check-label" for="laki@{{row}}">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" ng-model="input[row].jenis_kelamin" id="perempuan@{{row}}" value="perempuan">
                                    <label class="form-check-label" for="perempuan@{{row}}">Perempuan</label>
                                </div>
                                <input type="hidden" name="jenis_kelamin[]" value="@{{input[row].jenis_kelamin}}">
                            </div>           
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label for="pelatih" class="form-label">Pelatih</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" ng-model="input[row].pelatih" id="pelatihlaki@{{row}}" value="laki">
                                    <label class="form-check-label" for="pelatihlaki@{{row}}">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" ng-model="input[row].pelatih" id="pelatihperempuan@{{row}}" value="perempuan">
                                    <label class="form-check-label" for="pelatihperempuan@{{row}}">Perempuan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" ng-model="input[row].pelatih" id="pelatihbebas@{{row}}" value="bebas">
                                    <label class="form-check-label" for="pelatihbebas@{{row}}">Bebas</label>
                                </div>
                                <input type="hidden" name="pelatih[]" value="@{{input[row].pelatih}}">
                            </div>
                            <div class="mb-3">
                                <label for="foto@" class="form-label">Unggah Foto Anda</label>
                                <input class="form-control" ng-model="input[row].foto" style="padding-top: 12px;padding-left: 20px" type="file" id="foto" placeholder="coba" ng-files="onFileSelected($files,row)" name="foto[]">
                                <div class="text-right">
                                    <small class="text-muted">Max. 2MB</small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bukti" class="form-label">Unggah Bukti Pembayaran</label>
                                <input class="form-control" ng-model="input[row].bukti" style="padding-top: 12px;padding-left: 20px" type="file" id="bukti" placeholder="coba" ng-files="onBuktiSelected($files,row)" name="bukti[]">
                                <div class="text-right">
                                    <small class="text-muted">Max. 2MB</small>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="pelatih" class="form-label">Riwayat Gangguan Tertentu</label><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">                                                     
                                            <input class="form-check-input" type="checkbox" ng-model="riwayat[row][0].isChecked" id="riwayat1@{{row}}" value="riwayat[row][0].id" ng-change="changeSelection()">
                                            <label class="form-check-label" for="riwayat1@{{row}}">@{{riwayat[row][0].label}}</label>
                                        </div>
                                        <div class="form-check">                                
                                            <input class="form-check-input" type="checkbox" ng-model="riwayat[row][1].isChecked" id="riwayat2@{{row}}" value="riwayat[row][1].id" ng-change="changeSelection()">
                                            <label class="form-check-label" for="riwayat2@{{row}}">@{{riwayat[row][1].label}}</label>
                                        </div>
                                        <div class="form-check">                                
                                            <input class="form-check-input" type="checkbox" ng-model="riwayat[row][2].isChecked" id="riwayat3@{{row}}" value="riwayat[row][2].id" ng-change="changeSelection()">
                                            <label class="form-check-label" for="riwayat3@{{row}}">@{{riwayat[row][2].label}}</label>
                                        </div>
                                        <div class="form-check">                                
                                            <input class="form-check-input" type="checkbox" ng-model="riwayat[row][3].isChecked" id="riwayat4@{{row}}" value="riwayat[row][3].id" ng-change="changeSelection()">
                                            <label class="form-check-label" for="riwayat4@{{row}}">@{{riwayat[row][3].label}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">                                
                                            <input class="form-check-input" type="checkbox" ng-model="riwayat[row][4].isChecked" id="riwayat5@{{row}}" value="riwayat[row][4].id" ng-change="changeSelection()">
                                            <label class="form-check-label" for="riwayat5@{{row}}">@{{riwayat[row][4].label}}</label>
                                        </div>
                                        <div class="form-check">                                
                                            <input class="form-check-input" type="checkbox" ng-model="riwayat[row][5].isChecked" id="riwayat6@{{row}}" value="riwayat[row][5].id" ng-change="changeSelection()">
                                            <label class="form-check-label" for="riwayat6@{{row}}">@{{riwayat[row][5].label}}</label>
                                        </div>
                                        <div class="form-check">                                
                                            <input class="form-check-input" type="checkbox" ng-model="riwayat[row][6].isChecked" id="riwayat7@{{row}}" value="riwayat[row][6].id" ng-change="changeSelection()">
                                            <label class="form-check-label" for="riwayat7@{{row}}">@{{riwayat[row][6].label}}</label>
                                        </div>    
                                    </div>
                                    <input type="hidden" name="riwayat[]" value="@{{selectedRiwayatLabel[row]}}">
                                </div>
                            </div>
                            <div class="form-floating mb-5">
                                <textarea class="form-control" placeholder="Tuliskan alasan anda" id="alasan" ng-model="input[row].alasan" style="height: 100px" name="alasan[]"></textarea>
                                <label for="alasan">Alasan Belajar Renang</label>
                            </div>                                 
                            <input type="hidden" name="program[]" value="@{{paket.program}}">
                            <input type="hidden" name="jumlah[]" value="@{{paket.jumlah}}">
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="container" ng-show="isForm">            
            <button class="btn btn-block btn-success" type="submit">Daftar!</button>
        </div>
                    
    </form>    
</section>
@endSection()