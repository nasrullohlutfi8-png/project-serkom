@extends('layouts.landing')

@section('title', 'Guru & Tenaga Pendidik | SMAN 1 Padakembang')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <span class="text-primary fw-semibold text-uppercase">
                Tenaga Pendidik
            </span>

            <h1 class="fw-bold mt-2">
                Guru & Tenaga Pendidik
            </h1>

            <p class="text-secondary mx-auto" style="max-width: 700px;">
                Kenali tenaga pendidik SMAN 1 Padakembang
                yang berperan dalam mendampingi dan mengembangkan
                potensi peserta didik.
            </p>

        </div>


        {{-- DATA GURU --}}
        @if($guru->count())

            <div class="row g-4">

                @foreach($guru as $item)

                    <div class="col-lg-3 col-md-4 col-sm-6">

                        <div class="card border-0 shadow-sm h-100">

                            {{-- FOTO --}}
                            <div class="text-center pt-4">

                                @if($item->foto && $item->foto !== 'tidak ada')

                                    <img
                                        src="{{ asset('storage/guru/' . $item->foto) }}"
                                        alt="{{ $item->nama_guru }}"
                                        class="rounded-circle"
                                        width="140"
                                        height="140"
                                        style="object-fit: cover;"
                                    >

                                @else

                                    <div
                                        class="rounded-circle bg-primary text-white
                                               d-flex align-items-center justify-content-center
                                               mx-auto"
                                        style="width: 140px; height: 140px;"
                                    >
                                        <i class="fas fa-user fa-3x"></i>
                                    </div>

                                @endif

                            </div>


                            {{-- INFORMASI --}}
                            <div class="card-body text-center">

                                <h5 class="fw-bold mb-2">
                                    {{ $item->nama_guru }}
                                </h5>

                                @if($item->jabatan)

                                    <p class="text-primary mb-1">
                                        {{ $item->jabatan }}
                                    </p>

                                @endif

                                @if($item->mapel)

                                    <p class="text-secondary mb-3">
                                        {{ $item->mapel }}
                                    </p>

                                @endif


                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('guru.public.show', $item->id) }}"
                                    class="btn btn-outline-primary btn-sm rounded-pill px-4"
                                >
                                    <i class="fas fa-user me-1"></i>
                                    Lihat Profil
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- DATA KOSONG --}}
            <div class="text-center py-5">

                <i class="fas fa-users fa-3x text-secondary mb-3"></i>

                <h5 class="fw-bold">
                    Data Guru Belum Tersedia
                </h5>

                <p class="text-secondary">
                    Data guru belum tersedia saat ini.
                </p>

            </div>

        @endif

        <div class="text-center">
            <div class="mt-4">
                <a href="{{ route('landing') }}"
                class="btn btn-outline-primary rounded-pill px-4">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>

    </div>

</section>

@endsection