@extends('layout.landing_template')
@section('content')
<section class="container mt-5" style="height: 100%">
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h4>Pilih Program</h4>
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
            <div class="card-header">
                <h4>Formulir Data Murid @{{ row }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/daftar/simpan') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-5 form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="nama@contoh.com">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="Nomor Telp.">
                                <label for="telp" class="form-label">Nomor Telepon/HP (WhatsApp)</label>
                            </div>
                            <div class="mb-5 form-floating">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            </div>
                            <div class="form-floating mb-5">
                                <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat" style="height: 100px"></textarea>
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="mb-5">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="laki">
                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>           
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label for="pelatih" class="form-label">Pelatih</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pelatih" id="pelatihlaki" value="laki">
                                    <label class="form-check-label" for="pelatihlaki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pelatih" id="pelatihperempuan" value="perempuan">
                                    <label class="form-check-label" for="pelatihperempuan">Perempuan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pelatih" id="pelatihbebas" value="bebas">
                                    <label class="form-check-label" for="pelatihbebas">Bebas</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bukti" class="form-label">Unggah Foto Anda</label>
                                <input class="form-control" style="padding-top: 12px;padding-left: 20px" type="file" id="bukti" placeholder="coba">
                                <div class="text-right">
                                    <small class="text-muted">Max. 2MB</small>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="pelatih" class="form-label">Riwayat Gangguan Tertentu</label><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat" id="riwayat1" value="jantung">
                                            <label class="form-check-label" for="riwayat1">Jantung</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat" id="riwayat2" value="paru">
                                            <label class="form-check-label" for="riwayat2">Paru</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat" id="riwayat3" value="otot">
                                            <label class="form-check-label" for="riwayat3">Otot</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat" id="riwayat4" value="syaraf">
                                            <label class="form-check-label" for="riwayat4">Syaraf</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat" id="riwayat5" value="tulang">
                                            <label class="form-check-label" for="riwayat5">Tulang</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat" id="riwayat6" value="lemak">
                                            <label class="form-check-label" for="riwayat6">Lemak</label>
                                        </div>        
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="riwayat" id="riwayat7" value="lainnya">
                                            <label class="form-check-label" for="riwayat7">Jika ada yang lainnya sebutkan di kolom alasan belajar renang</label>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-5">
                                <textarea class="form-control" placeholder="Tuliskan alasan anda" id="alasan" name="alasan" style="height: 100px"></textarea>
                                <label for="alasan">Alasan Belajar Renang</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container" ng-show="isForm">
        <button class="btn btn-block btn-success" type="submit">Daftar!</button>
    </div>
</section>
@endSection()