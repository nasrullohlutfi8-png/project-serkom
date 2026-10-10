@extends('layouts.template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading & Date -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Dashboard Utama</h1>
        <div class="text-muted small font-weight-bold">
            <i class="fas fa-calendar-alt fa-fw mr-1"></i> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>
    </div>

    <!-- Banner Selamat Datang -->
    <div class="card bg-primary text-white shadow mb-4 border-0">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="font-weight-bold mb-1">
                        <i class="far fa-smile mr-2"></i>Selamat Datang, {{ Auth::user()->name ?? 'Administrator' }}!
                    </h4>
                    <p class="mb-0 opacity-75">
                        Gunakan panel dashboard ini untuk mengelola informasi portal sekolah, data siswa, guru, serta kegiatan kesiswaan secara terpusat.
                    </p>
                </div>
                <div class="d-none d-md-block opacity-50">
                    <i class="fas fa-school fa-4x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row : 4 Stats Cards (Siswa, Guru, Prestasi, Ekstrakurikuler) -->
    <div class="row">

        <!-- Total Siswa Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 border-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Siswa</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalSiswa ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Guru Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 border-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Guru & Staf</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalGuru ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Prestasi Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 border-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Prestasi</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalPrestasi ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-award fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Ekstrakurikuler Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 border-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ekstrakurikuler</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalEkskul ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-running fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row : Main Section -->
    <div class="row">

        <!-- Area Berita & Pengumuman Terbaru -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow border-0 mb-4">
                <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bullhorn mr-2"></i>Berita & Pengumuman Terbaru
                    </h6>
                    <div>
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-sm btn-link font-weight-bold p-0 mr-2">Pengumuman &rarr;</a>
                        <a href="{{ route('berita.index') }}" class="btn btn-sm btn-link font-weight-bold p-0">Berita &rarr;</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        
                        <!-- Loop Data Pengumuman Terbaru -->
                        @forelse($pengumumanTerbaru as $pengumuman)
                            <li class="list-group-item p-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="mb-1">
                                        <span class="badge badge-warning text-dark mr-1">Pengumuman</span>
                                        <strong class="text-gray-800">{{ $pengumuman->judul }}</strong>
                                    </div>
                                    <div class="small text-muted">
                                        <i class="far fa-clock mr-1"></i> {{ $pengumuman->created_at->diffForHumans() }} 
                                        @if(isset($pengumuman->user))
                                            &bull; <i class="far fa-user mr-1"></i> {{ $pengumuman->user->name }}
                                        @endif
                                    </div>
                                </div>
                                <span class="badge badge-success px-3 py-2 rounded-pill">
                                    {{ $pengumuman->status ?? 'Terbit' }}
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item p-3 text-center text-muted small">
                                Belum ada pengumuman terbaru.
                            </li>
                        @endforelse

                        <!-- Loop Data Berita Terbaru -->
                        @forelse($beritaTerbaru as $berita)
                            <li class="list-group-item p-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="mb-1">
                                        <span class="badge badge-info mr-1">Berita</span>
                                        <strong class="text-gray-800">{{ $berita->judul }}</strong>
                                    </div>
                                    <div class="small text-muted">
                                        <i class="far fa-clock mr-1"></i> {{ $berita->created_at->diffForHumans() }} 
                                        @if(isset($berita->user))
                                            &bull; <i class="far fa-user mr-1"></i> {{ $berita->user->name }}
                                        @endif
                                    </div>
                                </div>
                                <span class="badge badge-success px-3 py-2 rounded-pill">
                                    {{ $berita->status ?? 'Terbit' }}
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item p-3 text-center text-muted small">
                                Belum ada berita terbaru.
                            </li>
                        @endforelse

                    </ul>
                </div>
            </div>
        </div>

        <!-- Area Aksi Cepat (Kanan) -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bolt mr-2"></i>Aksi Cepat
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('pengumuman.create') }}" class="btn btn-warning text-dark btn-block text-left mb-2 shadow-sm font-weight-bold py-2">
                            <i class="fas fa-scroll mr-2"></i> Buat Pengumuman Baru
                        </a>
                        <a href="{{ route('berita.create') }}" class="btn btn-primary btn-block text-left mb-2 shadow-sm font-weight-bold py-2">
                            <i class="fas fa-newspaper mr-2"></i> Tambah Berita Baru
                        </a>
                        <a href="{{ route('siswa.create') }}" class="btn btn-success btn-block text-left mb-2 shadow-sm font-weight-bold py-2">
                            <i class="fas fa-user-plus mr-2"></i> Tambah Data Siswa
                        </a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('profil.index') }}" class="btn btn-secondary btn-block text-left shadow-sm font-weight-bold py-2">
                                <i class="fas fa-fw fa-id-card mr-2"></i> Profil Sekolah
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection