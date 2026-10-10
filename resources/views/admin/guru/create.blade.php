@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Guru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" value="{{ old('nama_guru') }}" required maxlength="40">
                    @error('nama_guru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" required maxlength="15">
                    @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran (Mapel)</label>
                    <input type="text" name="mapel" class="form-control @error('mapel') is-invalid @enderror" value="{{ old('mapel') }}" required maxlength="40">
                    @error('mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" required>
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="guru_mapel" {{ old('jabatan') == 'guru_mapel' ? 'selected' : '' }}>Guru Mapel</option>
                        <option value="guru_produktif" {{ old('jabatan') == 'guru_produktif' ? 'selected' : '' }}>Guru Produktif</option>
                        <option value="tenaga_kependidikan" {{ old('jabatan') == 'tenaga_kependidikan' ? 'selected' : '' }}>Tenaga Kependidikan</option>
                    </select>
                    @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror">
                    <small class="text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
                    @error('foto') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection