@extends('layouts.landing')

@section('title', 'Berita | {{ $profilSekolah->nama_sekolah}}')

@section('content')

<!-- =========================
     HEADER BERITA
========================= -->

<section class="py-5 bg-light">

    <div class="container py-4">

        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2 rounded-pill">
                INFORMASI SEKOLAH
            </span>

            <h1 class="fw-bold mt-3">
                Berita
                <span class="text-primary">
                    {{ $profilSekolah->nama_sekolah}}
                </span>
            </h1>

            <p class="text-muted mx-auto"
               style="max-width: 650px;">

                Temukan berbagai informasi dan berita terbaru
                seputar kegiatan {{ $profilSekolah->nama_sekolah}}

            </p>

        </div>


        <!-- =========================
             DAFTAR BERITA
        ========================= -->

        <div class="row g-4">

            @forelse ($berita as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm overflow-hidden">


                        <!-- GAMBAR -->

                        @if ($item->gambar)
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                class="card-img-top"
                                style="height: 230px; object-fit: cover;"
                                alt="{{ $item->judul }}"
                            >
                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center"
                                style="height: 230px;">

                                <i class="fas fa-newspaper fa-3x text-white"></i>

                            </div>
                        @endif


                        <!-- CONTENT -->

                        <div class="card-body d-flex flex-column">

                            <!-- TANGGAL -->

                            <small class="text-muted mb-2">

                                <i class="fas fa-calendar-alt me-2"></i>

                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                            </small>


                            <!-- JUDUL -->

                            <h5 class="fw-bold">

                                {{ $item->judul }}

                            </h5>


                            <!-- ISI -->

                            <p class="text-muted">

                                {{ Str::limit(strip_tags($item->isi), 140) }}

                            </p>


                            <!-- BUTTON -->

                            <div class="mt-auto pt-2">

                                <a href="{{ route('berita.public.show', $item->slug) }}"
                                   class="btn btn-primary rounded-pill px-4">

                                    Baca Selengkapnya

                                    <i class="fas fa-arrow-right ms-2"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <!-- DATA KOSONG -->

                <div class="col-12">

                    <div class="text-center py-5">

                        <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>

                        <h4 class="fw-bold">

                            Belum Ada Berita

                        </h4>

                        <p class="text-muted">

                            Belum tersedia berita untuk ditampilkan.

                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection