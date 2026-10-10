@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Pengumuman</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pengumuman.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Pengumuman</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul') }}" required maxlength="50">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold d-block">Status Pengumuman</label>
                    
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <!-- Opsi Draft -->
                        <label class="btn btn-outline-secondary {{ (old('status', $pengumuman->status ?? 'Draft') == 'Draft') ? 'active' : '' }} px-4 py-2">
                            <input type="radio" name="status" value="Draft" autocomplete="off" 
                                {{ (old('status', $pengumuman->status ?? 'Draft') == 'Draft') ? 'checked' : '' }}>
                            <i class="fas fa-pen-alt mr-1"></i> Draft
                        </label>
                        
                        <!-- Opsi Publish -->
                        <label class="btn btn-outline-success {{ (old('status', $pengumuman->status ?? '') == 'Publish') ? 'active' : '' }} px-4 py-2">
                            <input type="radio" name="status" value="Publish" autocomplete="off" 
                                {{ (old('status', $pengumuman->status ?? '') == 'Publish') ? 'checked' : '' }}>
                            <i class="fas fa-check-circle mr-1"></i> Publish
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Pengumuman</label>
                    <textarea name="isi" id="isi" rows="5" class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi') }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection