@extends('layouts.landing')

@section('title', $prestasi->nama_prestasi . ' | {{ $profilSekolah->nama_sekolah}}')

@section('content')

<section class="py-5 bg-light">

    <div class="container py-4">

        {{-- Tombol kembali --}}
        <div class="mb-4">

            <a
                href="{{ route('prestasi.public.index') }}"
                class="btn btn-outline-primary rounded-pill"
            >

                <i class="fas fa-arrow-left me-2"></i>

                Kembali ke Prestasi

            </a>

        </div>


        {{-- Detail Prestasi --}}
        <div class="card border-0 shadow-sm overflow-hidden">

            <div class="row g-0">

                {{-- Gambar --}}
                <div class="col-lg-6">

                    @if ($prestasi->foto && $prestasi->foto != 'tidak ada')

                        <img
                            src="{{ asset('storage/prestasi/' . $prestasi->foto) }}"
                            class="w-100 h-100"
                            style="min-height: 400px; object-fit: cover;"
                            alt="{{ $prestasi->nama_prestasi }}"
                        >

                    @else

                        <div
                            class="bg-secondary d-flex align-items-center justify-content-center"
                            style="min-height: 400px;"
                        >

                            <i class="fas fa-trophy fa-5x text-white"></i>

                        </div>

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-lg-6">

                    <div class="p-4 p-lg-5">

                        {{-- Label --}}
                        <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">

                            PRESTASI SEKOLAH

                        </span>


                        {{-- Judul --}}
                        <h1 class="fw-bold mb-4">

                            {{ $prestasi->nama_prestasi }}

                        </h1>


                        {{-- Tahun --}}
                        <div class="mb-4">

                            <h6 class="fw-bold">

                                <i class="fas fa-calendar-alt text-primary me-2"></i>

                                Tahun Ajaran

                            </h6>

                            <p class="text-muted mb-0">

                                {{ $prestasi->tahun_ajaran }}

                            </p>

                        </div>


                        {{-- Deskripsi --}}
                        <div>

                            <h6 class="fw-bold">

                                <i class="fas fa-align-left text-primary me-2"></i>

                                Deskripsi

                            </h6>

                            <p class="text-muted">

                                {{ $prestasi->deskripsi }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection