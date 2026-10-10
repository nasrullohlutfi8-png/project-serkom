@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Edit Galeri</h6>
            <a href="{{ route('galeri.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('galeri.update', encryptId($galeri->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Judul Galeri</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}" maxlength="50" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold d-block">Kategori</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-info {{ old('kategori', $galeri->kategori) == 'Foto' ? 'active' : '' }} px-4 py-2">
                            <input type="radio" name="kategori" value="Foto" autocomplete="off" {{ old('kategori', $galeri->kategori) == 'Foto' ? 'checked' : '' }}>
                            <i class="fas fa-image mr-1"></i> Foto
                        </label>
                        <label class="btn btn-outline-danger {{ old('kategori', $galeri->kategori) == 'Vidio' ? 'active' : '' }} px-4 py-2">
                            <input type="radio" name="kategori" value="Vidio" autocomplete="off" {{ old('kategori', $galeri->kategori) == 'Vidio' ? 'checked' : '' }}>
                            <i class="fas fa-video mr-1"></i> Video
                        </label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', \Carbon\Carbon::parse($galeri->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold d-block">File Saat Ini</label>
                    @if($galeri->kategori == 'Foto')
                        <img src="{{ asset('storage/' . $galeri->file) }}" alt="Preview" width="150" class="img-thumbnail mb-2 d-block">
                    @else
                        <video width="200" controls class="rounded mb-2 d-block">
                            <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                        </video>
                    @endif
                    <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti file.</small>
                    @error('file')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Keterangan</label>
                    <textarea name="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror" required>{{ old('keterangan', $galeri->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Perbarui Galeri</button>
            </form>
        </div>
    </div>
</div>
@endsection