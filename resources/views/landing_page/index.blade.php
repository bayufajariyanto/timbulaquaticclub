@extends('layout.landing_page')
@section('content')
    <div class="miri-ui-kit-header-content text-center text-white d-flex flex-column justify-content-center align-items-center">
        <span class="d-none">Photo by <a href="https://unsplash.com/@marcusxsnapz?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Marcus Ng</a> on <a href="https://unsplash.com/s/photos/swim?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
        <h1 class="display-4 text-white">Berkembang bersama kami</h1>
        <p class="h5 font-weight-light text-white">Jadilah perenang professional bersama kami.</p>
        <p class="mt-4">
            <button class="btn btn-danger btn-pill mr-2">
                <a href="https://youtu.be/edPI5cdWgbM" class="text-decoration-none text-white" target="_blank">Watch Video</a>
            </button>
            <a href="{{ url('/daftar') }}" class="btn btn-success btn-pill">Daftar Sekarang</a>
        </p>
    </div>
</header>
<section class="miri-ui-kit-section mt-5">
        <div class="container">
            {{-- Mengapa memilih Timbul Aquatic Club --}}
            <div class="d-md-flex justify-content-between row">
                <div class="feature-box px-3">
                    <span class="card-icon bg-danger text-white rounded-circle"><i class="mdi mdi-bell"></i></span>
                    <h3 class="mb-3">Pelatih</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque consequuntur quo ipsa minus molestias magnam.</p>
                </div>
                <div class="feature-box px-3">
                    <span class="card-icon bg-success text-white rounded-circle"><i
                            class="mdi mdi-heart-outline"></i></span>
                    <h3 class="mb-3">Kejuaraan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure fugit tenetur nemo? Perferendis, odit ipsam.</p>
                </div>
                <div class="feature-box px-3">
                    <span class="card-icon bg-primary text-white rounded-circle"><i class="mdi mdi-vibrate"></i></span>
                    <h3 class="mb-3">Member</h3>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p> --}}
                    <p>Bergabung dan jadilah bagian dari ratusan member yang terdaftar.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="miri-ui-kit-section how-we-work-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-warning mb-3">BAGAIMANA KAMI BEKERJA</h5>
                        <h2 class="h1 font-weight-semibold mb-4">
                            Pelatih renang profesional menawarkan pelatihan renang untuk pemula yang ingin belajar dari nol.
                        </h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed esse doloremque
                            nostrum, fuga fugit minima quod delectus magni explicabo quis aliquam laborum molestiae sint
                            voluptatum ea beatae sunt rerum! Saepe. (Deskripsi metode yang digunakan)</p>
                        <p>
                            <button class="btn btn-rounded btn-danger raise-on-hover" data-toggle="lightbox" data-target="#demoVideoLightbox">
                                <i class="mdi mdi-play"></i>
                            </button>
                            <span class="button-label text-danger font-weight-medium ml-3">LIHAT BAGAIMANA KAMI BEKERJA</span>
                        </p>
                </div>
                <div class="col-md-6 d-md-flex justify-content-end">
                    <div class="card bg-dark text-white count-card">
                        <img src="assets/images/count-card-bg.jpg" alt="about 1" class="card-img">
                        <div class="card-img-overlay">
                            <div class="count-box bg-success text">
                                <span class="h2 text-white">30K</span>
                                <span class="font-weight-medium">Member</span>
                            </div>
                            <div class="count-box bg-danger">
                                <span class="h2 text-white">100</span>
                                <span class="font-weight-medium">Coach</span>
                            </div>
                            <div class="count-box bg-warning">
                                <span class="h2 text-white">5</span>
                                <span class="font-weight-medium">Trophy</span>
                            </div>
                            <div class="count-box bg-primary">
                                <span class="h2 text-white">100</span>
                                <span class="font-weight-medium">Contest</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="miri-ui-kit-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h6 class="text-warning mb-3">Tentang Kami</h5>
                        <h2 class="h1 font-weight-semibold mb-4">
                            Temui mitra bisnis kami yang bekerja di belakang layar.
                        </h2>
                        <p class="mb-5">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed esse doloremque
                            nostrum, fuga fugit minima quod delectus magni explicabo quis aliquam laborum molestiae sint
                            voluptatum ea beatae sunt rerum! Saepe.</p>
                        <p><button class="btn btn-primary">Learn more</button></p>
                </div>
                <div class="col-md-6 text-right"><img src="assets/images/about.png" alt="About" class="img-fluid"></div>
            </div>
        </div>
    </section>
    <Section class="miri-ui-kit-section team-members-section">
        <div class="container">
            <h2 class="pb-2 mb-5">Anggota Tim</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-1.jpg" alt="Team 1" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Maria Sumardiana Boelak</h5>
                            <p class=" font-weight-medium designation">Pendiri</p>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, impedit.</p> --}}
                            <p class="social-links">
                                <a href="https://facebook.com" class="icon-fb" target="_blank"><i class="mdi mdi-facebook-box"></i></a>
                                <a href="https://twitter.com" class="icon-twitter" target="_blank"><i class="mdi mdi-twitter-box"></i></a>
                                <a href="https://instagram.com" class="icon-insta" target="_blank"><i class="mdi mdi-instagram"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-2.jpg" alt="Team 2" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Kukuh Lugito</h5>
                            <p class=" font-weight-medium designation">Pelatih Selam</p>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, impedit.</p> --}}
                            <p class="social-links">
                                <a href="https://facebook.com" class="icon-fb" target="_blank"><i class="mdi mdi-facebook-box"></i></a>
                                <a href="https://twitter.com" class="icon-twitter" target="_blank"><i class="mdi mdi-twitter-box"></i></a>
                                <a href="https://instagram.com" class="icon-insta" target="_blank"><i class="mdi mdi-instagram"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-3.jpg" alt="Team 3" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Galuh Irma Ari Susanti</h5>
                            <p class=" font-weight-medium designation">Pelatih Renang</p>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, impedit.</p> --}}
                            <p class="social-links">
                                <a href="https://facebook.com" class="icon-fb" target="_blank"><i class="mdi mdi-facebook-box"></i></a>
                                <a href="https://twitter.com" class="icon-twitter" target="_blank"><i class="mdi mdi-twitter-box"></i></a>
                                <a href="https://instagram.com" class="icon-insta" target="_blank"><i class="mdi mdi-instagram"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Section>
    <section class="miri-ui-kit-section pricing-section">
        <main>
            <div class="container">
              <h5 class="text-center pricing-table-subtitle">PAKET HARGA</h5>
              <h1 class="text-center pricing-table-title">Tabel Harga</h1>
              <div class="row">
                <div class="col-md-4">
                    <div class="card pricing-card pricing-plan-basic">
                    <div class="card-body">
                        <i class="mdi mdi-cube-outline pricing-plan-icon"></i>
                        <p class="pricing-plan-title">Basic</p>
                        <h3 class="pricing-plan-cost ml-auto">GRATIS</h3>
                        <ul class="pricing-plan-features">
                        <li>Unlimited conferences</li>
                        <li>100 participants max</li>
                        <li>Custom Hold Music</li>
                        <li>10 participants max</li>
                        </ul>
                        <a href="#!" class="btn pricing-plan-purchase-btn">Detail</a>
                        {{-- <a href="#!" class="btn btn-outline-primary">Detail</a> --}}
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card pricing-card pricing-card-highlighted  pricing-plan-pro">
                    <div class="card-body">
                        <i class="mdi mdi-wallet-giftcard pricing-plan-icon"></i>
                        {{-- <i class="mdi mdi-trophy pricing-plan-icon"></i> --}}
                        <p class="pricing-plan-title">Kelas Privat</p>
                        <h3 class="pricing-plan-cost ml-auto">Rp 750K</h3>
                        <ul class="pricing-plan-features">
                            <li>1 jam/pertemuan</li>
                            <li>11X pertemuan</li>
                            <li>Custom Hold Music</li>
                            <li>10 participants max</li>
                        </ul>
                        <p><small class="text-danger">*Tidak termasuk tiket kolam</small></p>
                        <a href="#!" class="btn pricing-plan-purchase-btn">Detail</a>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card pricing-card pricing-plan-enterprise">
                    <div class="card-body">
                        {{-- <i class="mdi mdi-wallet-giftcard pricing-plan-icon"></i> --}}
                        <i class="fas fa-child pricing-plan-icon"></i>
                        <p class="pricing-plan-title">Kelas Anak Berkebutuhan Khusus/Kelas Terapi</p>
                        <h3 class="pricing-plan-cost ml-auto">Rp 200K</h3>
                        <ul class="pricing-plan-features">
                            <li>1,5 jam/pertemuan</li>
                            <li>4X pertemuan</li>
                            <li>Custom Hold Music</li>
                            <li>10 participants max</li>
                        </ul>
                        <p><small class="text-danger">*Tidak termasuk tiket kolam</small></p>
                        <a href="#!" class="btn pricing-plan-purchase-btn">Detail</a>
                        {{-- <a href="#!" class="btn btn-outline-primary">Detail</a> --}}
                    </div>
                    </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-4">
                    <div class="card pricing-card  pricing-plan-pro">
                        <div class="card-body">
                            <i class="fas fa-baby pricing-plan-icon"></i>
                            {{-- <i class="mdi mdi-trophy pricing-plan-icon"></i> --}}
                        <p class="pricing-plan-title">Kelas Pemula</p>
                        <h3 class="pricing-plan-cost ml-auto">Rp 150K</h3>
                        <ul class="pricing-plan-features">
                            <li>1,5 jam/pertemuan</li>
                            <li>4X pertemuan</li>
                            <li>Custom Hold Music</li>
                            <li>10 participants max</li>
                        </ul>
                        <p><small class="text-muted">*Sudah termasuk tiket kolam</small></p>
                        <a href="#!" class="btn pricing-plan-purchase-btn">Detail</a>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-4">
                    <div class="card pricing-card pricing-plan-enterprise">
                        <div class="card-body">
                            <i class="mdi mdi-trophy pricing-plan-icon"></i>
                            {{-- <i class="mdi mdi-wallet-giftcard pricing-plan-icon"></i> --}}
                            <p class="pricing-plan-title">Kelas Prestasi/Selam</p>
                            <h3 class="pricing-plan-cost ml-auto">Rp 130K</h3>
                            <ul class="pricing-plan-features">
                                <li>1,5 jam/pertemuan</li>
                                <li class="text-danger">X kali pertemuan</li>
                                <li>Custom Hold Music</li>
                                <li>10 participants max</li>
                            </ul>
                            <p><small class="text-danger">*Tidak termasuk tiket kolam</small></p>
                            <a href="#!" class="btn pricing-plan-purchase-btn">Detail</a>
                        </div>
                        </div>
                  </div>
                  <div class="col-md-1"></div>
              </div>
            </div>
        </main>
    </section>
    <section class="miri-ui-kit-section contact-section">
        <div class="container">
            <h2 class="text-center mb-4">Tanyakan pada kami</h2>
            <p class="text-center mb-4 pb-3">
                Jika ada yang bisa kami bantu, beri tahu kami.<br>Kami akan dengan senang hati menawarkan bantuan kepada anda.
            </p>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form action="{{ url('/') }}" class="contact-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill"
                                    placeholder="Email@example.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill" placeholder="Nomor HP (WA)">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="submit" value="Send Message" class="btn btn-block btn-pill btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="pt-5 mt-2">
        <div class="container">
            <section class="footer-content text-center">
                <h2 class="">Lorem ipsum dolor sit amet consectetur.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, ipsum!.</p>
                <a href="{{ url('/daftar') }}" class="btn btn-success mt-3">Daftar Sekarang!</a>
                <p class="footer-social-links text-center my-4">
                    <a href="https://www.facebook.com/timbulsc.pasuruan.1" class="icon-fb" target="_blank"><i class="mdi mdi-facebook-box"></i></a>
                    {{-- <a href="#" class="icon-twitter"><i class="mdi mdi-twitter-box"></i></a> --}}
                    <a href="https://instagram.com/timbulaquaticclub" class="icon-insta" target="_blank"><i class="mdi mdi-instagram"></i></a>
                    {{-- <a href="#" class="icon-behance"><i class="mdi mdi-behance"></i></a> --}}
                    <a href="https://youtu.be/edPI5cdWgbM" class="icon-youtube" onMouseOver="this.style.color='#F00'" onMouseOut="this.style.color='#777373'" target="_blank"><i class="mdi mdi-youtube"></i></a>
                    {{-- <a href="#" class="icon-github"><i class="mdi mdi-github-circle"></i></a> --}}
                </p>
            </section>
@endSection()