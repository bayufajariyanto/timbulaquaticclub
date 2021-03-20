<!DOCTYPE html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }} | Timbul Aquatic Club Pasuruan</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">    
    {{-- Datatables css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
    @yield('head')
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/logo.svg')}}" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>            
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                    <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="image">
                    <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                    <p class="mb-1 text-black">{{ ucfirst(strtolower(Auth::user()->name)) }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{route('akun.editpassword')}}">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Ubah Password </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout mr-2 text-primary"></i> Signout                         
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">                
                    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                    </li>            
                    @can('manage-administration')                    
                    <li class="nav-item {{ Route::is('pertanyaan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pertanyaan') }}">
                        <span class="menu-title">Pertanyaan</span>
                        <i class="mdi mdi-message menu-icon"></i>
                    </a>
                    </li>
                    <li class="nav-item {{ Route::is('laporan.list') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('laporan.list') }}">
                            <span class="menu-title">Laporan</span>
                            <i class="mdi mdi-file-document menu-icon"></i>
                        </a>
                    </li>
                    @endcan
                    @can('manage-users')
                    <li class="nav-item sidebar-actions">
                        <span class="nav-link">                    
                            <div class="border-bottom">
                                <p class="text-secondary">Akun</p>
                        </div>                    
                    </span>
                </li>                
                <li class="nav-item {{ Route::is('akun.list') ? 'active' : '' }}">                
                    <a class="nav-link" href="{{ route('akun.list') }}">
                        <span class="menu-title">List Akun</span>
                        <i class="mdi mdi-account menu-icon"></i>
                    </a>
                </li>
                @endcan                
                @can('manage-administration')                    
                <li class="nav-item sidebar-actions">
                    <span class="nav-link">                    
                        <div class="border-bottom">
                            <p class="text-secondary">Atlit</p>
                        </div>                    
                    </span>
                </li>                                          
                <li class="nav-item {{ Route::is('pendaftaran.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pendaftaran.index') }}">
                    <span class="menu-title">Pendaftaran</span>
                    <i class="mdi mdi-clipboard-account menu-icon"></i>
                </a>
                </li>
                <li class="nav-item {{ Route::is('murid.list') ? 'active' : '' }}">                
                    <a class="nav-link" href="{{ route('murid.list') }}">
                        <span class="menu-title">List Atlit</span>
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                    </a>
                </li>
                {{-- <li class="nav-item {{ Route::is('murid.tambah') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('murid.tambah') }}">
                            <span class="menu-title">Tambah Murid</span>
                            <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                        </a>
                    </li> --}}
                <li class="nav-item {{ Route::is('rapor.list') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rapor.list') }}">
                        <span class="menu-title">Rapor</span>
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                    </a>                    
                </li>
                @endcan           
                @can('display-nilai')                        
                <li class="nav-item {{ Route::is('murid.nilai') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('murid.nilai') }}">
                        <span class="menu-title">Rapor</span>
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                    </a>                    
                </li>
                @endcan
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('alert')
                    @yield('breadcumb')
                    @yield('content')
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            {{-- <footer class="footer">
                <div class="container-fluid clearfix">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © timbulaquaticclub.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
                </div>
            </footer> --}}
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->        
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->
    {{-- Datatables js --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable( {
                columnDefs: [ {
                    targets: [ 0 ],
                    orderData: [ 0, 1 ]
                }, {
                    targets: [ 1 ],
                    orderData: [ 1, 0 ]
                }, {
                    targets: [ 4 ],
                    orderData: [ 4, 0 ]
                } ]
            } );
        } );
    </script>
    @yield('footer')
  </body>
</html>