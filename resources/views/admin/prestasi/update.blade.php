@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Prestasi</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('prestasi.update', encryptId($prestasi->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Prestasi</label>
                    <input type="text" name="nama_prestasi" class="form-control @error('nama_prestasi') is-invalid @enderror" value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}" required maxlength="40">
                    @error('nama_prestasi') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror" value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}" required maxlength="20">
                    @error('tahun_ajaran') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                    @error('deskripsi') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Foto Saat Ini:</label><br>
                    @if($prestasi->foto)
                        <img src="{{ asset('storage/prestasi/' . $prestasi->foto) }}" alt="Foto" width="80" class="mb-2 rounded">
                    @else
                        <p class="text-muted">Tidak ada foto</p>
                    @endif
                    <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror mt-1">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                    @error('foto') 
                        <div class="invalid-feedback d-block">{{ $message }}</div> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Perbarui</button>
                <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection