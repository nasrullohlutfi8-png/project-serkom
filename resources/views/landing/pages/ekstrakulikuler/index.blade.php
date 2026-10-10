@extends('layouts.landing')

@section('title', 'Ekstrakurikuler | {{ $profilSekolah->nama_sekolah}}')

@section('content')

<section class="py-5 bg-light">

    <div class="container py-4">

        {{-- Judul --}}
        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2 rounded-pill">
                KEGIATAN SEKOLAH
            </span>

            <h1 class="fw-bold mt-3">
                Ekstrakurikuler
                <span class="text-primary">
                    {{ $profilSekolah->nama_sekolah}}
                </span>
            </h1>

            <p class="text-muted mx-auto"
               style="max-width: 650px;">

                Berbagai kegiatan ekstrakurikuler yang dapat
                diikuti oleh siswa untuk mengembangkan bakat,
                minat, dan keterampilan.

            </p>

        </div>


        {{-- Daftar Ekstrakurikuler --}}
        <div class="row g-4">

            @forelse ($ekstrakulikuler as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm overflow-hidden">

                        {{-- Gambar --}}
                        @if ($item->gambar)

                            <img
                                src="{{ asset('storage/ekstrakulikuler/' . $item->gambar) }}"
                                class="card-img-top"
                                style="height: 230px; object-fit: cover;"
                                alt="{{ $item->nama_eskul }}"
                            >

                        @else

                            <div
                                class="bg-secondary d-flex align-items-center justify-content-center"
                                style="height: 230px;"
                            >

                                <i class="fas fa-users fa-4x text-white"></i>

                            </div>

                        @endif


                        {{-- Isi Card --}}
                        <div class="card-body d-flex flex-column">

                            {{-- Nama Eskul --}}
                            <h5 class="fw-bold">

                                {{ $item->nama_eskul }}

                            </h5>


                            {{-- Pembina --}}
                            <p class="text-muted mb-2">

                                <i class="fas fa-user-tie text-primary me-2"></i>

                                Pembina:
                                {{ $item->pembina }}

                            </p>


                            {{-- Jadwal --}}
                            <p class="text-muted mb-3">

                                <i class="fas fa-calendar-alt text-primary me-2"></i>

                                {{ $item->jadwal_latihan }}

                            </p>


                            {{-- Deskripsi --}}
                            <p class="text-muted">

                                {{ Str::limit($item->deskripsi, 120) }}

                            </p>


                            {{-- Tombol --}}
                            <div class="mt-auto pt-2">

                                <a
                                    href="{{ route('ekstrakulikuler.public.show', $item->slug) }}"
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

                {{-- Jika belum ada data --}}
                <div class="col-12">

                    <div class="text-center py-5">

                        <i class="fas fa-users fa-4x text-muted mb-3"></i>

                        <h4 class="fw-bold">
                            Belum Ada Ekstrakurikuler
                        </h4>

                        <p class="text-muted">
                            Belum tersedia data ekstrakurikuler sekolah.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection