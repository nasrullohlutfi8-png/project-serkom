@extends('layouts.landing')

@section('title', $berita->judul . ' | {{ $profilSekolah->nama_sekolah}}')

@section('content')


<style>

.berita-content {
    font-size: 17px;
    line-height: 1.9;
    color: #555;
}

</style>

<section class="py-5">

    <div class="container py-4">

        <div class="row justify-content-center">

            <div class="col-lg-9">


                <!-- =========================
                     TOMBOL KEMBALI
                ========================= -->

                <a href="{{ route('berita.public.index') }}"
                   class="btn btn-outline-primary rounded-pill mb-4">

                    <i class="fas fa-arrow-left me-2"></i>

                    Kembali ke Berita

                </a>


                <!-- =========================
                     JUDUL
                ========================= -->

                <h1 class="fw-bold mb-3">

                    {{ $berita->judul }}

                </h1>


                <!-- =========================
                     TANGGAL
                ========================= -->

                <div class="text-muted mb-4">

                    <i class="fas fa-calendar-alt me-2"></i>

                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                </div>


                <!-- =========================
                     GAMBAR
                ========================= -->

                @if ($berita->gambar)

                    <img
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        class="img-fluid w-100 rounded-4 shadow-sm mb-4"
                        style="max-height: 500px; object-fit: cover;"
                        alt="{{ $berita->judul }}"
                    >

                @endif


                <!-- =========================
                     ISI BERITA
                ========================= -->

                <div class="berita-content">

                    {!! nl2br(e($berita->isi)) !!}

                </div>


            </div>

        </div>

    </div>

</section>

@endsection