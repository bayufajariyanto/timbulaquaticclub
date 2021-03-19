<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./assets/images/icon.ico" type="image/x-icon">
    <!-- Template by bootstrapdash.com -->
    <title>Timbul Aquatic Club</title>
    <!-- Vendor css -->
    <link rel="stylesheet" href="../src/vendors/@mdi/font/css/materialdesignicons.min.css">

    <!-- Base css with customised bootstrap included -->
    <link rel="stylesheet" href="../src/css/miri-ui-kit-free.css">

    <!-- Stylesheet for demo page specific css -->
    <link rel="stylesheet" href="./assets/css/demo.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/pricing-plan.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        a .nav-icon .icon-youtube {
            color: #FF0000;
        }
        * {
            -webkit-touch-callout: none; /* iOS Safari */
                -webkit-user-select: none; /* Safari */
                -khtml-user-select: none; /* Konqueror HTML */
                -moz-user-select: none; /* Old versions of Firefox */
                    -ms-user-select: none; /* Internet Explorer/Edge */
                        user-select: none; /* Non-prefixed version, currently
                                            supported by Chrome, Edge, Opera and Firefox */
        }
    </style>
</head>
<body ng-app="app" ng-controller="controller">
    <header class="miri-ui-kit-header landing-header header-bg-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-on-scroll">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="./assets/images/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miriUiKitNavbar"
                    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mdi mdi-menu"></span>
                </button>            
                <div class="collapse navbar-collapse" id="miriUiKitNavbar">
                    <div class="navbar-nav ml-auto">
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="http://bootstrapdash.com/demo/miri-ui-kit-pro/documentation/documentation.html" target="_blank">Docs</span></a> --}}
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Program
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item text-break" style="margin-top: -8px" ng-repeat="value in programs"><i class="dropdown-item-icon"></i>@{{ value.nama }}</a>
                                {{-- <a href="#" class="dropdown-item" style="margin-top: -8px"><i class="dropdown-item-icon mdi mdi-shape-outline"></i>Paket 1</a>
                                <a href="#" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-lock-outline"></i>2. Kelas Privat</a>
                                <a href="#" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-shield-account-outline"></i>3. Kelas Anak Berkebutuhan Khusus/Terapi</a>
                                <a href="#" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-shield-account-outline"></i>4. Kelas Pemula</a>
                                <a href="#" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-shield-account-outline"></i>5. Kelas Prestasi/Selam</a> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Kami
                            </a>
                            {{-- <div class="dropdown-menu dropdown-menu-right ">
                                <a href="landing.html" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-shape-outline"></i>Landing Page</a>
                                <a href="login.html" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-lock-outline"></i>Login Page</a>
                                <a href="profile.html" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-shield-account-outline"></i>Profile Page</a>
                            </div> --}}
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ url('/pelatih') }}" class="dropdown-item" style="margin-top: -8px"><i class="dropdown-item-icon mdi mdi-shield-account-outline"></i>Pelatih</a>
                                <a href="{{ url('tentang') }}" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-domain"></i>Tentang Kami</a>
                                <a href="{{ url('/lokasi') }}" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-map-marker-outline"></i>Lokasi Latihan</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link nav-icon icon-twitter" href="#"><i class="mdi mdi-twitter-box"></i></a>
                            <a class="nav-link nav-icon icon-fb" href="https://www.facebook.com/timbulsc.pasuruan.1" target="_blank"><i class="mdi mdi-facebook-box"></i></a>
                            <a class="nav-link nav-icon icon-insta" href="https://instagram.com/timbulaquaticclub" target="_blank"><i class="mdi mdi-instagram"></i></a>
                            <a href="https://youtu.be/edPI5cdWgbM" class="nav-link nav-icon icon-youtube" onMouseOver="this.style.color='#F00'" onMouseOut="this.style.color='#FFF'" target="_blank"><i class="mdi mdi-youtube"></i></a> --}}
                            @guest
                                <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>    
                            @else                                
                                <a href="{{ route('home') }}" class="btn btn-primary">Dashboard</a>    
                            @endguest
                            
                        </li>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
        @yield('daftar')

        <nav class="navbar navbar-light bg-transparent navbar-expand d-block d-sm-flex text-center">
            <span class="navbar-text">&copy; Timbul Aquatic Club <?= date('Y') == 2021 ? 2021 : "2021-".date('Y') ?>. All rights reserved.</span>
            {{-- <div class="navbar-nav ml-auto justify-content-center">
                <a href="#" class="nav-link">Support</a>
                <a href="#" class="nav-link">Terms</a>
                <a href="#" class="nav-link">Privacy</a>
            </div> --}}
            {{-- <span class="navbar-text ml-auto">Developed by 
                <a href="http://instagram.com/bayufajariyanto" class="text-decoration-none" style="color: unset" target="_blank">
                    Bayu Fajariyanto
                </a>
            </span> --}}
        </nav>
    </div>
</footer>
    <div id="demoVideoLightbox" class="lightbox" onclick="hideVideo('video','youtube')">
        <div class="lightbox-container">  
            <div class="lightbox-content">        
                <button data-close="lightbox" class="lightbox-close">
                Close | ✕
                </button>
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/edPI5cdWgbM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <script src="../src/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../src/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../src/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../src/js/miri-ui-kit.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="../js/angular.js"></script>
</body>
</html>