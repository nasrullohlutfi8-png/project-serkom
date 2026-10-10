@extends('layouts.landing')

@section('title', $ekstrakulikuler->nama_eskul . ' | {{ $profilSekolah->nama_sekolah}}')

@section('content')

<section class="py-5 bg-light">

    <div class="container py-4">

        {{-- Tombol kembali --}}
        <div class="mb-4">

            <a
                href="{{ route('ekstrakulikuler.public.index') }}"
                class="btn btn-outline-primary rounded-pill"
            >

                <i class="fas fa-arrow-left me-2"></i>

                Kembali ke Ekstrakurikuler

            </a>

        </div>


        {{-- Detail --}}
        <div class="card border-0 shadow-sm overflow-hidden">

            <div class="row g-0">

                {{-- Gambar --}}
                <div class="col-lg-6">

                    @if ($ekstrakulikuler->gambar)

                        <img
                            src="{{ asset('storage/ekstrakulikuler/' . $ekstrakulikuler->gambar) }}"
                            class="w-100 h-100"
                            style="min-height: 450px; object-fit: cover;"
                            alt="{{ $ekstrakulikuler->nama_eskul }}"
                        >

                    @else

                        <div
                            class="bg-secondary d-flex align-items-center justify-content-center"
                            style="min-height: 450px;"
                        >

                            <i class="fas fa-users fa-5x text-white"></i>

                        </div>

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-lg-6">

                    <div class="p-4 p-lg-5">

                        {{-- Label --}}
                        <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">

                            EKSTRAKURIKULER

                        </span>


                        {{-- Nama --}}
                        <h1 class="fw-bold mb-4">

                            {{ $ekstrakulikuler->nama_eskul }}

                        </h1>


                        {{-- Pembina --}}
                        <div class="mb-4">

                            <h6 class="fw-bold">

                                <i class="fas fa-user-tie text-primary me-2"></i>

                                Pembina

                            </h6>

                            <p class="text-muted mb-0">

                                {{ $ekstrakulikuler->pembina }}

                            </p>

                        </div>


                        {{-- Jadwal --}}
                        <div class="mb-4">

                            <h6 class="fw-bold">

                                <i class="fas fa-calendar-alt text-primary me-2"></i>

                                Jadwal Latihan

                            </h6>

                            <p class="text-muted mb-0">

                                {{ $ekstrakulikuler->jadwal_latihan }}

                            </p>

                        </div>


                        {{-- Deskripsi --}}
                        <div>

                            <h6 class="fw-bold">

                                <i class="fas fa-align-left text-primary me-2"></i>

                                Deskripsi

                            </h6>

                            <p class="text-muted">

                                {{ $ekstrakulikuler->deskripsi }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection