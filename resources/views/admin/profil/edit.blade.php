@extends('layouts.template')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Profil Sekolah</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input / Edit Profil Sekolah</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Sekolah <span class="text-danger">*</span></label>
                            <input type="text" name="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required maxlength="40">
                            @error('nama_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kepala Sekolah <span class="text-danger">*</span></label>
                            <input type="text" name="kepala_sekolah" class="form-control @error('kepala_sekolah') is-invalid @enderror" value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}" required maxlength="40">
                            @error('kepala_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>NPSN <span class="text-danger">*</span></label>
                            <input type="text" name="npsn" class="form-control @error('npsn') is-invalid @enderror" value="{{ old('npsn', $profil->npsn) }}" required maxlength="10">
                            @error('npsn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kontak / Telepon <span class="text-danger">*</span></label>
                            <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak', $profil->kontak) }}" required>
                            @error('kontak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tahun Berdiri <span class="text-danger">*</span></label>
                            <input type="number" name="tahun_berdiri" class="form-control @error('tahun_berdiri') is-invalid @enderror" value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}" placeholder="Contoh: 2010" required>
                            @error('tahun_berdiri') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Sekolah <span class="text-danger">*</span></label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2" required>{{ old('alamat', $profil->alamat) }}</textarea>
                    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Visi & Misi <span class="text-danger">*</span></label>
                    <textarea name="visi_misi" class="form-control @error('visi_misi') is-invalid @enderror" rows="4" required>{{ old('visi_misi', $profil->visi_misi) }}</textarea>
                    @error('visi_misi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Deskripsi Sekolah <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $profil->deskripsi) }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo Sekolah</label>
                            @if($profil->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $profil->logo) }}" width="100" class="img-thumbnail">
                                </div>
                            @endif
                            <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror">
                            @error('logo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto Sekolah</label>
                            @if($profil->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $profil->foto) }}" width="100" class="img-thumbnail">
                                </div>
                            @endif
                            <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror">
                            @error('foto') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-save"></i> Simpan Profil
                </button>
            </form>
        </div>
    </div>

</div>
@endsection