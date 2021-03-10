@extends('layout.landing_template')
@section('content')
<section class="container mt-5" style="height: 100%">
    <form action="{{ url('/pendaftaran') }}" method="post">
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
                                <input type="email" class="form-control" id="email@{{row}}" name="email[]" ng-model="form[row].email" placeholder="nama@contoh.com">
                                <label for="email@{{row}}" class="form-label">Email</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="text" class="form-control" id="nama@{{row}}" name="nama[]" ng-model="form[row].nama" placeholder="Nama Lengkap">
                                <label for="nama@{{row}}" class="form-label">Nama Lengkap</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="text" class="form-control" id="telp@{{row}}" name="telp[]" ng-model="form[row].telp" placeholder="Nomor Telp.">
                                <label for="telp@{{row}}" class="form-label">Nomor Telepon/HP (WhatsApp)</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="date" class="form-control" id="tanggal_lahir@{{row}}" name="tanggal_lahir[]" ng-model="form[row].tanggal_lahir" placeholder="Tanggal Lahir">
                                <label for="tanggal_lahir@{{row}}" class="form-label">Tanggal Lahir</label>
                            </div>
                            <div class="form-floating mb-5">
                                <textarea class="form-control" placeholder="Alamat" id="alamat@{{row}}" name="alamat[]" ng-model="form[row].alamat" style="height: 100px"></textarea>
                                <label for="alamat@{{row}}">Alamat</label>
                            </div>
                            <div class="mb-5">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin[]" ng-model="form[row].jenis_kelamin" id="laki@{{row}}" value="laki">
                                    <label class="form-check-label" for="laki@{{row}}">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin[]" ng-model="form[row].jenis_kelamin" id="perempuan@{{row}}" value="perempuan">
                                    <label class="form-check-label" for="perempuan@{{row}}">Perempuan</label>
                                </div>
                            </div>           
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label for="pelatih" class="form-label">Pelatih</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pelatih[]" ng-model="form[row].pelatih" id="pelatihlaki@{{row}}" value="laki">
                                    <label class="form-check-label" for="pelatihlaki@{{row}}">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pelatih[]" ng-model="form[row].pelatih" id="pelatihperempuan@{{row}}" value="perempuan">
                                    <label class="form-check-label" for="pelatihperempuan@{{row}}">Perempuan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pelatih[]" ng-model="form[row].pelatih" id="pelatihbebas@{{row}}" value="bebas">
                                    <label class="form-check-label" for="pelatihbebas@{{row}}">Bebas</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="foto@{{row}}" class="form-label">Unggah Foto Anda</label>
                                <input class="form-control" name="foto[]" ng-model="form[row].foto" style="padding-top: 12px;padding-left: 20px" type="file" id="foto@{{row}}" placeholder="coba">
                                <div class="text-right">
                                    <small class="text-muted">Max. 2MB</small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bukti@{{row}}" class="form-label">Unggah Bukti Pembayaran</label>
                                <input class="form-control" name="bukti[]" ng-model="form[row].bukti" style="padding-top: 12px;padding-left: 20px" type="file" id="bukti@{{row}}" placeholder="coba">
                                <div class="text-right">
                                    <small class="text-muted">Max. 2MB</small>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="pelatih" class="form-label">Riwayat Gangguan Tertentu</label><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat[]" ng-model="form[row].riwayat" id="riwayat1@{{row}}" value="jantung">
                                            <label class="form-check-label" for="riwayat1@{{row}}">Jantung</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat[]" ng-model="form[row].riwayat" id="riwayat2@{{row}}" value="paru">
                                            <label class="form-check-label" for="riwayat2@{{row}}">Paru</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat[]" ng-model="form[row].riwayat" id="riwayat3@{{row}}" value="otot">
                                            <label class="form-check-label" for="riwayat3@{{row}}">Otot</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat[]" ng-model="form[row].riwayat" id="riwayat4@{{row}}" value="syaraf">
                                            <label class="form-check-label" for="riwayat4@{{row}}">Syaraf</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat[]" ng-model="form[row].riwayat" id="riwayat5@{{row}}" value="tulang">
                                            <label class="form-check-label" for="riwayat5@{{row}}">Tulang</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat[]" ng-model="form[row].riwayat" id="riwayat6@{{row}}" value="lemak">
                                            <label class="form-check-label" for="riwayat6@{{row}}">Lemak</label>
                                        </div>        
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat[]" ng-model="form[row].riwayat" id="riwayat7@{{row}}" value="lainnya">
                                            <label class="form-check-label" for="riwayat7@{{row}}">Jika ada yang lainnya sebutkan di kolom alasan belajar renang</label>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-5">
                                <textarea class="form-control" placeholder="Tuliskan alasan anda" id="alasan@{{row}}" name="alasan[]" ng-model="form[row].alasan" style="height: 100px"></textarea>
                                <label for="alasan@{{row}}">Alasan Belajar Renang</label>
                            </div>
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