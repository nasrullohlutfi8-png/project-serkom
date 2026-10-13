
@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-edit"></i> Edit Data Siswa
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Siswa</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>NISN</label>
                    <input
                        type="text"
                        name="nisn"
                        class="form-control @error('nisn') is-invalid @enderror"
                        value="{{ old('nisn', $siswa->nisn) }}"
                        required
                        maxlength="10"
                    >

                    @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input
                        type="text"
                        name="nama_siswa"
                        class="form-control @error('nama_siswa') is-invalid @enderror"
                        value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                        required
                        maxlength="40"
                    >

                    @error('nama_siswa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select
                        name="jenis_kelamin"
                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                        required
                    >
                        <option value="">-- Pilih Jenis Kelamin --</option>

                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>

                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <select
                        name="kelas_id"
                        class="form-control @error('kelas_id') is-invalid @enderror"
                        required
                    >
                        <option value="">-- Pilih Kelas --</option>

                        @foreach($kelas as $item)
                            <option
                                value="{{ $item->id }}"
                                {{ old('kelas_id', $siswa->kelas_id) == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->nama_kelas }}
                            </option>
                        @endforeach
                    </select>

                    @error('kelas_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input
                        type="number"
                        name="tahun_masuk"
                        class="form-control @error('tahun_masuk') is-invalid @enderror"
                        value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                        required
                        min="2000"
                        max="2099"
                    >

                    @error('tahun_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Perbarui
                </button>

                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
