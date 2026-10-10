@extends('layouts.landing')

@section('title', 'Profil Sekolah | ' . ($profilSekolah->nama_sekolah ?? 'Sekolah'))

@section('content')

<section class="bg-primary text-white py-5">

<div class="container py-4">

    <div class="row align-items-center">

        <div class="col-lg-8">

            <span class="text-uppercase fw-semibold">
                Profil Sekolah
            </span>

            <h1 class="display-5 fw-bold mt-2 mb-3">
                {{ $profilSekolah->nama_sekolah }}
            </h1>

            <p class="lead mb-0">
                Mengenal lebih dekat
                {{ $profilSekolah->nama_sekolah }}
                melalui informasi dan sejarah sekolah.
            </p>

        </div>

        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

            @if($profilSekolah->logo)

                <img
                    src="{{ asset('storage/' . $profilSekolah->logo) }}"
                    alt="Logo {{ $profilSekolah->nama_sekolah }}"
                    class="img-fluid"
                    style="max-height: 150px;"
                >

            @endif

        </div>

    </div>

</div>

</section>

<section class="py-5">

<div class="container">

    <div class="row g-5 align-items-center">

        <div class="col-lg-5">

            @if($profilSekolah->foto)

                <img
                    src="{{ asset('storage/' . $profilSekolah->foto) }}"
                    alt="Foto {{ $profilSekolah->nama_sekolah }}"
                    class="img-fluid rounded-4 shadow"
                    style="width: 100%; height: 380px; object-fit: cover;"
                >

            @else

                <div
                    class="bg-light rounded-4 d-flex align-items-center justify-content-center"
                    style="height: 380px;"
                >

                    <div class="text-center text-secondary">

                        <i class="fas fa-school fa-4x mb-3"></i>

                        <p class="mb-0">
                            Foto sekolah belum tersedia
                        </p>

                    </div>

                </div>

            @endif

        </div>


        <div class="col-lg-7">

            <span class="text-primary fw-semibold text-uppercase">
                Tentang Sekolah
            </span>

            <h2 class="fw-bold mt-2 mb-4">
                {{ $profilSekolah->nama_sekolah }}
            </h2>

            <p class="text-secondary lh-lg">
                {{ $profilSekolah->deskripsi }}
            </p>

        </div>

    </div>

</div>

</section>

<section class="py-5 bg-light">

<div class="container">

    <div class="text-center mb-5">

        <span class="text-primary fw-semibold text-uppercase">
            Informasi Sekolah
        </span>

        <h2 class="fw-bold mt-2">
            Data {{ $profilSekolah->nama_sekolah }}
        </h2>

    </div>


    <div class="row g-4">

        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="text-primary mb-3">
                        <i class="fas fa-school fa-2x"></i>
                    </div>

                    <small class="text-secondary">
                        Nama Sekolah
                    </small>

                    <h5 class="fw-bold mt-1">
                        {{ $profilSekolah->nama_sekolah }}
                    </h5>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="text-primary mb-3">
                        <i class="fas fa-user-tie fa-2x"></i>
                    </div>

                    <small class="text-secondary">
                        Kepala Sekolah
                    </small>

                    <h5 class="fw-bold mt-1">
                        {{ $profilSekolah->kepala_sekolah }}
                    </h5>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="text-primary mb-3">
                        <i class="fas fa-id-card fa-2x"></i>
                    </div>

                    <small class="text-secondary">
                        NPSN
                    </small>

                    <h5 class="fw-bold mt-1">
                        {{ $profilSekolah->npsn }}
                    </h5>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="text-primary mb-3">
                        <i class="fas fa-calendar-days fa-2x"></i>
                    </div>

                    <small class="text-secondary">
                        Tahun Berdiri
                    </small>

                    <h5 class="fw-bold mt-1">
                        {{ $profilSekolah->tahun_berdiri }}
                    </h5>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="text-primary mb-3">
                        <i class="fas fa-phone fa-2x"></i>
                    </div>

                    <small class="text-secondary">
                        Kontak
                    </small>

                    <h5 class="fw-bold mt-1">
                        {{ $profilSekolah->kontak }}
                    </h5>

                </div>

            </div>

        </div>


        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <div class="text-primary mb-3">
                        <i class="fas fa-location-dot fa-2x"></i>
                    </div>

                    <small class="text-secondary">
                        Alamat
                    </small>

                    <p class="fw-semibold mt-1 mb-0">
                        {{ $profilSekolah->alamat }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

<section class="py-5">

<div class="container">

    <div class="text-center mb-5">

        <span class="text-primary fw-semibold text-uppercase">
            Visi & Misi
        </span>

        <h2 class="fw-bold mt-2">
            Arah dan Tujuan Sekolah
        </h2>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-lg-5">

                    <div class="d-flex align-items-start">

                        <div class="text-primary me-4">

                            <i class="fas fa-bullseye fa-2x"></i>

                        </div>

                        <div>

                            <h4 class="fw-bold mb-3">
                                Visi & Misi
                            </h4>

                            <div class="text-secondary lh-lg">
                                {!! nl2br(e($profilSekolah->visi_misi)) !!}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

<section class="py-5 bg-light">
    
<div class="container">

    <div class="row justify-content-center text-center">

        <div class="col-lg-8">

            <h2 class="fw-bold mb-3">
                Kenali {{ $profilSekolah->nama_sekolah }} Lebih Dekat
            </h2>

            <p class="text-secondary mb-4">
                Temukan berbagai informasi, berita, prestasi,
                ekstrakurikuler, dan kegiatan sekolah.
            </p>

            <a
                href="{{ url('/') }}"
                class="btn btn-primary px-4 py-2"
            >

                <i class="fas fa-house me-2"></i>

                Kembali ke Beranda

            </a>

        </div>

    </div>

</div>

</section>

@endsection
