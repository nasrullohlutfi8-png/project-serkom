@extends('layouts.landing')

@section('title', 'Beranda | SMAN 1 Padakembang')

@section('content')

    {{-- Hero --}}
    @include('landing.components.hero')

    {{-- Profil Sekolah --}}
    @include('landing.components.profil')

    {{-- Guru --}}
    @include('landing.components.guru')

    {{-- Ekstrakurikuler --}}
    @include('landing.components.ekstrakulikuler')

    {{-- Berita --}}
    @include('landing.components.berita')

    {{-- Pengumuman --}}
    @include('landing.components.pengumuman')

    {{-- Prestasi --}}
    @include('landing.components.prestasi')

    {{-- Galeri --}}
    @include('landing.components.galeri')

    @include('landing.components.siswa')


@endsection