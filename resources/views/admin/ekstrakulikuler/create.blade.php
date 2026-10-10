@extends('layouts.template')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus fa-sm mr-2 text-gray-500"></i>
        Tambah Ekstrakurikuler
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Ekstrakurikuler</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('ekstrakulikuler.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nama_eskul">Nama Ekstrakurikuler</label>
                    <input type="text" class="form-control @error('nama_eskul') is-invalid @enderror" id="nama_eskul" name="nama_eskul" value="{{ old('nama_eskul') }}" required>
                    @error('nama_eskul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pembina">Pembina</label>
                    <input type="text" class="form-control @error('pembina') is-invalid @enderror" id="pembina" name="pembina" value="{{ old('pembina') }}" required>
                    @error('pembina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jadwal_latihan">Jadwal Latihan</label>
                    <input type="text" class="form-control @error('jadwal_latihan') is-invalid @enderror" id="jadwal_latihan" name="jadwal_latihan" value="{{ old('jadwal_latihan') }}" required>
                    @error('jadwal_latihan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar (Opsional)</label>
                    <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                    @error('gambar')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

</div>

@endsection