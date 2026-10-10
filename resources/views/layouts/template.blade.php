<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi {{ $profilSekolah->nama_sekolah}}">
    <meta name="author" content="">

    <title>{{ $profilSekolah->nama_sekolah}}</title>
    <link rel="icon" type="img/png" href="{{ asset('storage/' . $profilSekolah->logo)}}">

    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Penanda menu aktif pada sidebar -->
    <style>
        /* Menu utama (level 1) yang aktif */
        .sidebar .nav-item.active > .nav-link {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 4px solid #fff;
            font-weight: 700;
            color: #fff;
        }

        .sidebar .nav-item.active > .nav-link i {
            color: #fff;
        }

        /* Submenu (level 2) yang aktif */
        .sidebar .collapse-inner .collapse-item.active {
            background-color: #eaecf4;
            border-left: 3px solid #4e73df;
            color: #4e73df;
            font-weight: 700;
        }

        .sidebar .collapse-inner .collapse-item.active i {
            color: #4e73df !important;
        }
    </style>

</head>

@php
    // ====== Deteksi halaman aktif (berdasarkan nama route) ======
    $isDashboard   = request()->routeIs('dashboard');

    // Master Data
    $isGuru        = request()->routeIs('guru.*');
    $isSiswa       = request()->routeIs('siswa.*');
    $isMasterData  = $isGuru || $isSiswa;

    // Kesiswaan
    $isPrestasi    = request()->routeIs('prestasi.*');
    $isEkskul      = request()->routeIs('ekstrakulikuler.*');
    $isKesiswaan   = $isPrestasi || $isEkskul;

    // Publikasi
    $isPengumuman  = request()->routeIs('pengumuman.*');
    $isBerita      = request()->routeIs('berita.*');
    $isGaleri      = request()->routeIs('galeri.*');
    $isPublikasi   = $isPengumuman || $isBerita || $isGaleri;

    // Pengaturan Sistem
    $isProfil      = request()->routeIs('profil.*');
    $isUser        = request()->routeIs('user.*');
@endphp

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center py-3"
        href="{{ route('dashboard') }}">

            <div class="sidebar-brand-icon">

                @if ($profilSekolah && $profilSekolah->logo)

                    <img
                        src="{{ asset('storage/' . $profilSekolah->logo) }}"
                        alt=""
                        class="img-fluid"
                        style="max-height: 40px; width: auto;"
                    >

                @endif

            </div>

            <div class="sidebar-brand-text mx-2 text-left"
                style="font-size: 0.75rem;">

                @if ($profilSekolah)

                    {{ strtoupper($profilSekolah->nama_sekolah) }}

                @endif

            </div>

        </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $isDashboard ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                NAVIGASI UTAMA
            </div>

            <!-- Nav Item - Master Data -->
            <li class="nav-item {{ $isMasterData ? 'active' : '' }}">
                <a class="nav-link {{ $isMasterData ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
                    data-target="#collapseMasterData"
                    aria-expanded="{{ $isMasterData ? 'true' : 'false' }}" aria-controls="collapseMasterData">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseMasterData" class="collapse {{ $isMasterData ? 'show' : '' }}">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ $isGuru ? 'active' : '' }}" href="{{ route('guru.index') }}">
                            <i class="fas fa-chalkboard-teacher fa-sm mr-2 text-gray-600"></i>Data Guru
                        </a>
                        <a class="collapse-item {{ $isSiswa ? 'active' : '' }}" href="{{ route('siswa.index') }}">
                            <i class="fas fa-user-graduate fa-sm mr-2 text-gray-600"></i>Data Siswa
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Kesiswaan -->
            <li class="nav-item {{ $isKesiswaan ? 'active' : '' }}">
                <a class="nav-link {{ $isKesiswaan ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
                    data-target="#collapseKesiswaan"
                    aria-expanded="{{ $isKesiswaan ? 'true' : 'false' }}" aria-controls="collapseKesiswaan">
                    <i class="fas fa-fw fa-user-shield"></i>
                    <span>Kesiswaan</span>
                </a>
                <div id="collapseKesiswaan" class="collapse {{ $isKesiswaan ? 'show' : '' }}">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ $isPrestasi ? 'active' : '' }}" href="{{ route('prestasi.index') }}">
                            <i class="fas fa-award fa-sm mr-2 text-gray-600"></i>Prestasi Siswa
                        </a>
                        <a class="collapse-item {{ $isEkskul ? 'active' : '' }}" href="{{ route('ekstrakulikuler.index') }}">
                            <i class="fas fa-running fa-sm mr-2 text-gray-600"></i>Ekstrakurikuler
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Publikasi -->
            <li class="nav-item {{ $isPublikasi ? 'active' : '' }}">
                <a class="nav-link {{ $isPublikasi ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
                    data-target="#collapsePublikasi"
                    aria-expanded="{{ $isPublikasi ? 'true' : 'false' }}" aria-controls="collapsePublikasi">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>Publikasi</span>
                </a>
                <div id="collapsePublikasi" class="collapse {{ $isPublikasi ? 'show' : '' }}">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ $isPengumuman ? 'active' : '' }}" href="{{ route('pengumuman.index') }}">
                            <i class="fas fa-scroll fa-sm mr-2 text-gray-600"></i>Pengumuman
                        </a>
                        <a class="collapse-item {{ $isBerita ? 'active' : '' }}" href="{{ route('berita.index') }}">
                            <i class="fas fa-newspaper fa-sm mr-2 text-gray-600"></i>Berita Utama
                        </a>
                        <a class="collapse-item {{ $isGaleri ? 'active' : '' }}" href="{{ route('galeri.index') }}">
                            <i class="fas fa-photo-video fa-sm mr-2 text-gray-600"></i>Galeri Foto
                        </a>
                    </div>
                </div>
            </li>

        @if(auth()->user()->role === 'admin')
            <!-- Divider -->
            
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                PENGATURAN SISTEM
            </div>

                <li class="nav-item {{ $isProfil ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profil.index') }}">
                        <i class="fas fa-fw fa-id-card"></i>
                        <span>Profil Sekolah</span>
                    </a>
                </li>
                
                <li class="nav-item {{ $isUser ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-fw fa-users-cog"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Lihat Website -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span>Lihat Website</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ?? 'Administrator' }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('assets/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                    <!-- Form Logout Tersembunyi -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ $profilSekolah->nama_sekolah}} {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- JavaScript Files-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <script>
        $(function () {
            if ($(window).width() < 768 || $('.sidebar').hasClass('toggled')) {
                $('.sidebar .collapse.show').removeClass('show');
                $('.sidebar [data-toggle="collapse"]')
                    .addClass('collapsed')
                    .attr('aria-expanded', 'false');
            }
        });
    </script>

</body>

</html>