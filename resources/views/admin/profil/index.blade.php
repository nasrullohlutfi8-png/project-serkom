@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Sekolah</h1>
        <a href="{{ route('profil.edit') }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit Profil
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center mb-3">
                    @if($profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo" class="img-fluid rounded mb-2" style="max-height: 180px;">
                    @else
                        <div class="p-3 bg-light text-muted rounded">Belum Ada Logo</div>
                    @endif
                    <h5 class="font-weight-bold mt-2">{{ $profil->nama_sekolah }}</h5>
                    <span class="badge badge-info">NPSN: {{ $profil->npsn }}</span>
                </div>
                <div class="col-md-9">
                    <table class="table table-borderless">
                        <tr>
                            <th width="25%">Kepala Sekolah</th>
                            <td>: {{ $profil->kepala_sekolah }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Berdiri</th>
                            <td>: {{ $profil->tahun_berdiri }}</td>
                        </tr>
                        <tr>
                            <th>Kontak / Telepon</th>
                            <td>: {{ $profil->kontak }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $profil->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <h5 class="font-weight-bold text-primary">Visi & Misi</h5>
                    <p style="white-space: pre-line;">{{ $profil->visi_misi }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h5 class="font-weight-bold text-primary">Deskripsi Sekolah</h5>
                    <p style="white-space: pre-line;">{{ $profil->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection