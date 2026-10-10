@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Galeri</h6>
            <a href="{{ route('galeri.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Judul Galeri</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" maxlength="50" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold d-block">Kategori</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-info active px-4 py-2">
                            <input type="radio" name="kategori" value="Foto" autocomplete="off" checked>
                            <i class="fas fa-image mr-1"></i> Foto
                        </label>
                        <label class="btn btn-outline-danger px-4 py-2">
                            <input type="radio" name="kategori" value="Vidio" autocomplete="off">
                            <i class="fas fa-video mr-1"></i> Video
                        </label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Upload File (Gambar / Video)</label>
                    <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror" required>
                    <small class="form-text text-muted">Format yang didukung: JPG, PNG, GIF, MP4, WEBM (Maks: 20MB)</small>
                    @error('file')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Keterangan</label>
                    <textarea name="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror" required>{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Galeri</button>
            </form>
        </div>
    </div>
</div>
@endsection