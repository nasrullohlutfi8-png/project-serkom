@extends('layouts.landing')

@section('title', $guru->nama_guru . ' | Guru SMAN 1 Padakembang')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        {{-- BACK --}}
        <div class="mb-4">

            <a
                href="{{ route('guru.public.index') }}"
                class="text-decoration-none"
            >
                <i class="fas fa-arrow-left me-2"></i>
                Kembali ke Daftar Guru
            </a>

        </div>


        {{-- DETAIL CARD --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

            <div class="card-body p-4 p-md-5">

                <div class="row align-items-center g-5">

                    {{-- FOTO --}}
                    <div class="col-lg-4 text-center">

                        @if($guru->foto && $guru->foto !== 'tidak ada')

                            <img
                                src="{{ asset('storage/guru/' . $guru->foto) }}"
                                alt="{{ $guru->nama_guru }}"
                                class="rounded-circle shadow"
                                width="250"
                                height="250"
                                style="object-fit: cover;"
                            >

                        @else

                            <div
                                class="rounded-circle bg-primary text-white
                                       d-flex align-items-center justify-content-center
                                       mx-auto shadow"
                                style="width: 250px; height: 250px;"
                            >

                                <i class="fas fa-user fa-5x"></i>

                            </div>

                        @endif

                    </div>


                    {{-- INFORMASI --}}
                    <div class="col-lg-8">

                        <span class="text-primary fw-semibold text-uppercase">
                            Tenaga Pendidik
                        </span>

                        <h1 class="fw-bold mt-2 mb-4">
                            {{ $guru->nama_guru }}
                        </h1>


                        {{-- JABATAN --}}
                        <div class="mb-3">

                            <small class="text-secondary">
                                Jabatan
                            </small>

                            <div class="fw-semibold">
                                {{ $guru->jabatan ?? '-' }}
                            </div>

                        </div>


                        {{-- MATA PELAJARAN --}}
                        <div class="mb-3">

                            <small class="text-secondary">
                                Mata Pelajaran
                            </small>

                            <div class="fw-semibold">
                                {{ $guru->mapel ?? '-' }}
                            </div>

                        </div>


                        {{-- NIP --}}
                        <div class="mb-3">

                            <small class="text-secondary">
                                NIP
                            </small>

                            <div class="fw-semibold">
                                {{ $guru->nip ?? '-' }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection