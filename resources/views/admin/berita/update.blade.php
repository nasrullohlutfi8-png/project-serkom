@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Edit Berita</h6>
            <a href="{{ route('berita.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('berita.update', encryptId($berita->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Judul Berita</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}" maxlength="50" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold d-block">Gambar Saat Ini</label>
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Saat Ini" width="150" class="img-thumbnail mb-2">
                    <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    @error('gambar')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold d-block">Status</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary {{ old('status', $berita->status) == 'Draft' ? 'active' : '' }} px-4 py-2">
                            <input type="radio" name="status" value="Draft" autocomplete="off" {{ old('status', $berita->status) == 'Draft' ? 'checked' : '' }}>
                            <i class="fas fa-pen-alt mr-1"></i> Draft
                        </label>
                        <label class="btn btn-outline-success {{ old('status', $berita->status) == 'Pubish' ? 'active' : '' }} px-4 py-2">
                            <input type="radio" name="status" value="Pubish" autocomplete="off" {{ old('status', $berita->status) == 'Pubish' ? 'checked' : '' }}>
                            <i class="fas fa-check-circle mr-1"></i> Publish
                        </label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Isi Berita</label>
                    <textarea name="isi" rows="6" class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi', $berita->isi) }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Perbarui Berita</button>
            </form>
        </div>
    </div>
</div>
@endsection