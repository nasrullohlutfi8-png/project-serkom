@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Guru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" value="{{ old('nama_guru', $guru->nama_guru) }}" required maxlength="40">
                    @error('nama_guru') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $guru->nip) }}" required maxlength="15">
                    @error('nip') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran (Mapel)</label>
                    <input type="text" name="mapel" class="form-control @error('mapel') is-invalid @enderror" value="{{ old('mapel', $guru->mapel) }}" required maxlength="40">
                    @error('mapel') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" required>
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="guru_mapel" {{ old('jabatan', $guru->jabatan) == 'guru_mapel' ? 'selected' : '' }}>Guru Mapel</option>
                        <option value="guru_produktif" {{ old('jabatan', $guru->jabatan) == 'guru_produktif' ? 'selected' : '' }}>Guru Produktif</option>
                        <option value="tenaga_kependidikan" {{ old('jabatan', $guru->jabatan) == 'tenaga_kependidikan' ? 'selected' : '' }}>Tenaga Kependidikan</option>
                    </select>
                    @error('jabatan') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label>Foto Saat Ini:</label><br>
                    @if($guru->foto)
                        <img src="{{ asset('storage/guru/' . $guru->foto) }}" alt="Foto" width="80" class="mb-2 rounded">
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
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection