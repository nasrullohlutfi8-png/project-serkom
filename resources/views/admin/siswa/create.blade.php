@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Siswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf

                {{-- NISN --}}
                <div class="form-group">
                    <label>NISN</label>
                    <input type="text"
                           name="nisn"
                           class="form-control @error('nisn') is-invalid @enderror"
                           value="{{ old('nisn') }}"
                           required
                           maxlength="10">

                    @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NAMA SISWA --}}
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text"
                           name="nama_siswa"
                           class="form-control @error('nama_siswa') is-invalid @enderror"
                           value="{{ old('nama_siswa') }}"
                           required
                           maxlength="40">

                    @error('nama_siswa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- JENIS KELAMIN --}}
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                            class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih Jenis Kelamin --</option>

                        <option value="Laki-laki"
                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="Perempuan"
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>

                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- KELAS --}}
                <div class="form-group">
                    <label>Kelas</label>

                    <select name="kelas_id"
                            class="form-control @error('kelas_id') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih Kelas --</option>

                        @foreach($kelas as $item)
                            <option value="{{ $item->id }}"
                                {{ old('kelas_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kelas }}
                            </option>
                        @endforeach

                    </select>

                    @error('kelas_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TAHUN MASUK --}}
                <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input type="number"
                           name="tahun_masuk"
                           class="form-control @error('tahun_masuk') is-invalid @enderror"
                           value="{{ old('tahun_masuk', date('Y')) }}"
                           required
                           min="2000"
                           max="2099">

                    @error('tahun_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TOMBOL --}}
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>

                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>
@endsection