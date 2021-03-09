@extends('layout.landing_template')
@section('content')
<section class="container my-5" height="100%">
    <h2 class="mt-5">Tentang Kami</h2>
    <p class="mb-5">Timbul Aquatic Club adalah jasa pelatihan renang di Kota Pasuruan yang sudah berdiri sejak tahun <span class="text-danger"><?= date('Y') ?></span> sampai sekarang.
        Saat ini Timbul Aquatic Club sudah memiliki lebih dari <span class="text-danger">300</span> siswa renang, 
        kami telah meraih beberapa penghargaan dari beberapa kontes yang kami ikuti. Lokasi renang ada di 3 tempat berbeda sesuai program yang dipilih siswa diantaranya Kolam 
        <a href="https://goo.gl/maps/MBeAykrvPqDMgJQN9" class="text-reset" target="_blank">Tirto Kencono</a>, 
        <a href="https://goo.gl/maps/jkK7z9uqCSWr514T9" class="text-reset" target="_blank">Katak Riang</a>, 
        <a href="https://goo.gl/maps/AGDsLCocEWYUgkoD7" class="text-reset" target="_blank">Millenium Residence</a>
    </p>
    <div class="text-center">
        <h5 class="mt-5">Moto Kami</h5>
        <p>Keep Praying and Hard Practice, Pecah kan limitmu !!!</p>
        <h5 class="mt-5">Visi</h5>
        <p>Mewujudkan anak didik gemar, cinta, menjadikan prestasi cemerlang di dunia aquatik sehingga mengembangkan minat bakat dan melahirkan atlit  berprestasi yang cinta Pancasila dan Tuhan Yang Maha Esa</p>
        <h5 class="mt-5">Misi</h5>
        <p>
            <div class="row">
                <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <ul class="list-unstyled text-left">
                            <li>
                                <ul>
                                    <li>Mencari bibit atlit dan melakukan pemanduan bakat</li>
                                    <li>Menumbuhkan sikap, mental disiplin dan kerjasama untuk motivasi berlatih yang optimis, optimal menuju puncak prestasi</li>
                                    <li>Tetap mengutamakan Tuhan di dalam segala bentuk usaha prestasi yang di ridhoi Tuhan Yang Maha Kuasa</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <div class="col-md-2"></div>
            </div>
        </p>
    </div>
    <div class="mt-5">
        <div class="row d-flex">
            <div class="col-md-6 align-self-center">
                <h5>Hubungi Kami</h5>
                <p class="highlight">Timbul Aquatic Club<br>
                    0815585026790<br>
                    prsitimbulsc@gmail.com<br>
                    <a href="https://goo.gl/maps/vinAeXMSViC5efxT6" class="highlight text-reset text-decoration-none" target="_blank">Perum. Bugul Permai, Jl. Anggur VIII H6-10, Bugul Kidul, Kec. Bugulkidul, Kota Pasuruan, Jawa Timur 67129</a><br>
                </p>
            </div>
            <div class="col-md-6 text-md-right align-self-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.239297719233!2d112.91271301477731!3d-7.657400094479351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMzknMjYuNiJTIDExMsKwNTQnNTMuNyJF!5e0!3m2!1sid!2sid!4v1611046972682!5m2!1sid!2sid" width="260" height="260" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</section>
@endSection()