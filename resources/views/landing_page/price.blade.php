@extends('layout.landing_template')
@section('content')
<section class="container my-5" height="100%">    
    <h2 class="mt-5">
        {!!$title!!}
    </h2>
    {!!$harga!!}
    <p class="mt-2">{!!$keterangan!!}</p>
    <ul>
        @foreach ($listisi as $deskripsi)
            <li>{!!$deskripsi!!}</li>
        @endforeach
    </ul>

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
@endsection