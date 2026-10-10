@extends('layouts.landing')

@section('title', 'Prestasi | {{ $profilSekolah->nama_sekolah}}')

@section('content')

<section class="py-5 bg-light">

    <div class="container py-4">

        {{-- Judul halaman --}}
        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2 rounded-pill">
                PRESTASI SEKOLAH
            </span>

            <h1 class="fw-bold mt-3">
                Prestasi
                <span class="text-primary">
                    {{ $profilSekolah->nama_sekolah}}
                </span>
            </h1>

            <p class="text-muted mx-auto"
               style="max-width: 650px;">
                Berbagai pencapaian dan prestasi siswa
                {{ $profilSekolah->nama_sekolah}} dalam berbagai bidang.
            </p>

        </div>


        {{-- Daftar Prestasi --}}
        <div class="row g-4">

            @forelse ($prestasi as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm overflow-hidden">

                        {{-- Gambar --}}
                        @if ($item->foto && $item->foto != 'tidak ada')

                            <img
                                src="{{ asset('storage/prestasi/' . $item->foto) }}"
                                class="card-img-top"
                                style="height: 230px; object-fit: cover;"
                                alt="{{ $item->nama_prestasi }}"
                            >

                        @else

                            <div class="bg-secondary d-flex align-items-center justify-content-center"
                                 style="height: 230px;">

                                <i class="fas fa-trophy fa-4x text-white"></i>

                            </div>

                        @endif


                        {{-- Isi Card --}}
                        <div class="card-body d-flex flex-column">

                            {{-- Tahun --}}
                            <small class="text-muted mb-2">

                                <i class="fas fa-calendar-alt me-2"></i>

                                Tahun Ajaran:
                                {{ $item->tahun_ajaran }}

                            </small>


                            {{-- Nama Prestasi --}}
                            <h5 class="fw-bold">

                                {{ $item->nama_prestasi }}

                            </h5>


                            {{-- Deskripsi --}}
                            <p class="text-muted">

                                {{ Str::limit($item->deskripsi, 140) }}

                            </p>


                            {{-- Tombol --}}
                            <div class="mt-auto pt-2">

                                <a
                                    href="{{ route('prestasi.public.show', $item->slug) }}"
                                    class="btn btn-primary rounded-pill px-4"
                                >

                                    Lihat Detail

                                    <i class="fas fa-arrow-right ms-2"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- Kalau belum ada data --}}
                <div class="col-12">

                    <div class="text-center py-5">

                        <i class="fas fa-trophy fa-4x text-muted mb-3"></i>

                        <h4 class="fw-bold">
                            Belum Ada Prestasi
                        </h4>

                        <p class="text-muted">
                            Belum tersedia data prestasi sekolah.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection