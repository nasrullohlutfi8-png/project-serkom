<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profilSekolah->nama_sekolah ?? 'Sekolah' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('storage/' . $profilSekolah->logo) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        section {
            scroll-margin-top: 70px;
        }

        .school-name {
            line-height: 1.2;
        }

        .school-location {
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link {
            color: #212529 !important;
            transition: color 0.2s ease-in-out;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #0d6efd !important;
        }

        .dropdown-item {
            transition: all 0.2s ease-in-out;
        }

        .dropdown-item:hover {
            background-color: #f1f5ff;
            color: #0d6efd;
        }

        .dropdown-item.active {
            background-color: #0d6efd;
            color: white !important;
        }

        .dropdown-item.active i {
            color: white !important;
        }

        .carousel-caption {
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        footer a {
            transition: opacity 0.2s ease-in-out;
        }

        footer a:hover {
            opacity: 0.8;
        }

        .social-button {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarMenu" data-bs-offset="150">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('landing') }}#hero">
                @if($profilSekolah && $profilSekolah->logo)
                    <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo {{ $profilSekolah->nama_sekolah }}" width="52" height="52" class="me-2">
                @endif
                <div class="school-name">
                    <div class="fw-bold text-primary text-uppercase">
                        {{ $profilSekolah->nama_sekolah ?? 'Nama Sekolah' }}
                    </div>
                    <small class="text-secondary text-uppercase school-location">
                        KABUPATEN TASIKMALAYA
                    </small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link px-3 text-uppercase fw-semibold {{ request()->routeIs('landing') ? 'active' : '' }}" href="{{ route('landing') }}#hero">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-uppercase fw-semibold" href="{{ route('landing') }}#profil">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-uppercase fw-semibold {{ request()->routeIs('guru.*') ? 'active' : '' }}" href="{{ route('landing') }}#guru">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-uppercase fw-semibold {{ request()->routeIs('ekstrakulikuler.*') ? 'active' : '' }}" href="{{ route('landing') }}#ekstrakulikuler">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3 text-uppercase fw-semibold {{ request()->routeIs('berita.*', 'pengumuman.*') ? 'active' : '' }}" href="#" id="informasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi
                        </a>
                        <ul class="dropdown-menu border-0 shadow" aria-labelledby="informasiDropdown">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('berita.*') ? 'active' : '' }}" href="{{ route('landing') }}#berita">
                                    <i class="fas fa-newspaper me-2"></i> Berita
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}" href="{{ route('landing') }}#pengumuman">
                                    <i class="fas fa-bullhorn me-2"></i> Pengumuman
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-uppercase fw-semibold {{ request()->routeIs('prestasi.*') ? 'active' : '' }}" href="{{ route('landing') }}#prestasi">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-uppercase fw-semibold {{ request()->routeIs('galeri.*') ? 'active' : '' }}" href="{{ route('landing') }}#galeri">Galeri</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT SECTION -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="bg-primary text-white">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        @if($profilSekolah && $profilSekolah->logo)
                            <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo {{ $profilSekolah->nama_sekolah }}" width="65" height="65" class="me-3">
                        @endif
                        <div>
                            <h5 class="fw-bold text-uppercase mb-1">{{ $profilSekolah->nama_sekolah ?? 'Nama Sekolah' }}</h5>
                            <small class="text-white-50 text-uppercase">KABUPATEN TASIKMALAYA</small>
                        </div>
                    </div>
                    <p class="text-white-50">
                        Website resmi {{ $profilSekolah->nama_sekolah ?? 'sekolah' }} sebagai media informasi, komunikasi, dan pelayanan bagi seluruh warga sekolah.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-outline-light rounded-circle social-button me-2" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle social-button me-2" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle social-button me-2" title="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle social-button" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold text-uppercase mb-4">Menu</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a href="#hero" class="text-white text-decoration-none"><i class="fas fa-angle-right me-2"></i> Beranda</a></li>
                        <li class="mb-3"><a href="#profil" class="text-white text-decoration-none"><i class="fas fa-angle-right me-2"></i> Tentang Sekolah</a></li>
                        <li class="mb-3"><a href="#berita" class="text-white text-decoration-none"><i class="fas fa-angle-right me-2"></i> Berita</a></li>
                        <li class="mb-3"><a href="#prestasi" class="text-white text-decoration-none"><i class="fas fa-angle-right me-2"></i> Prestasi</a></li>
                        <li class="mb-3"><a href="#ekstrakulikuler" class="text-white text-decoration-none"><i class="fas fa-angle-right me-2"></i> Ekstrakurikuler</a></li>
                        <li class="mb-3"><a href="#galeri" class="text-white text-decoration-none"><i class="fas fa-angle-right me-2"></i> Galeri</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold text-uppercase mb-4">Kontak</h5>
                    @if($profilSekolah)
                        @if($profilSekolah->alamat)
                            <p class="text-white-50 mb-3"><i class="fas fa-location-dot me-2"></i> {{ $profilSekolah->alamat }}</p>
                        @endif
                        @if($profilSekolah->kontak)
                            <p class="text-white-50 mb-3"><i class="fas fa-phone me-2"></i> {{ $profilSekolah->kontak }}</p>
                        @endif
                        @if($profilSekolah->npsn)
                            <p class="text-white-50 mb-3"><i class="fas fa-school me-2"></i> NPSN: {{ $profilSekolah->npsn }}</p>
                        @endif
                        @if($profilSekolah->tahun_berdiri)
                            <p class="text-white-50 mb-3"><i class="fas fa-calendar me-2"></i> Berdiri Tahun {{ $profilSekolah->tahun_berdiri }}</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="border-top border-white border-opacity-25">
            <div class="container py-3">
                <div class="text-center text-white-50 small">
                    &copy; {{ date('Y') }} {{ $profilSekolah->nama_sekolah ?? 'Sekolah' }}. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>