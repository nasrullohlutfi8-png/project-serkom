@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Berita</h6>
            <a href="{{ route('berita.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <!-- Pastikan menggunakan enctype="multipart/form-data" untuk upload file -->
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Judul Berita</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" maxlength="50" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Gambar Berita</label>
                    <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror" required>
                    @error('gambar')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold d-block">Status</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary active px-4 py-2">
                            <input type="radio" name="status" value="Draft" autocomplete="off" checked>
                            <i class="fas fa-pen-alt mr-1"></i> Draft
                        </label>
                        <label class="btn btn-outline-success px-4 py-2">
                            <input type="radio" name="status" value="Pubish" autocomplete="off">
                            <i class="fas fa-check-circle mr-1"></i> Publish
                        </label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Isi Berita</label>
                    <textarea name="isi" rows="6" class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Berita</button>
            </form>
        </div>
    </div>
</div>
@endsection