
@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-graduate fa-sm"></i> Data Siswa
    </h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">
                Tabel Daftar Siswa
            </h6>

            <div class="d-flex align-items-center flex-wrap">
                <form action="{{ route('siswa.index') }}" method="GET"
                    class="form-inline mr-2 mb-2 mb-md-0">

                    <div class="input-group input-group-sm">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari Siswa..."
                            value="{{ request('search') }}"
                            style="min-width: 220px;"
                        >

                        @if(request('search'))
                            <div class="input-group-append">
                                <a href="{{ route('siswa.index') }}"
                                    class="btn btn-outline-secondary"
                                    title="Reset Pencarian">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        @endif

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Siswa
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable"
                    width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Tahun Masuk</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($siswas as $index => $siswa)
                            <tr>
                                <td class="text-center">
                                    {{ method_exists($siswas, 'firstItem') ? $siswas->firstItem() + $index : $index + 1 }}
                                </td>

                                <td>{{ $siswa->nisn }}</td>

                                <td>{{ $siswa->nama_siswa }}</td>

                                <td class="text-center">
                                    <span class="badge badge-{{ $siswa->jenis_kelamin == 'Laki-laki' ? 'primary' : 'success' }}">
                                        {{ $siswa->jenis_kelamin }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    {{ $siswa->kelas->nama_kelas ?? '-' }}
                                </td>

                                <td class="text-center">
                                    {{ $siswa->tahun_masuk }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('siswa.edit', $siswa->id) }}"
                                            class="btn btn-warning btn-sm mr-1"
                                            title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('siswa.destroy', $siswa->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="fas fa-search fa-2x text-gray-400 mb-2"></i>

                                    <p class="mb-0 text-muted">
                                        @if(request('search'))
                                            Data siswa dengan kata kunci
                                            <strong>{{ request('search') }}</strong>
                                            tidak ditemukan.
                                        @else
                                            Belum ada data siswa.
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($siswas, 'links'))
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                    <div class="text-muted small mb-2 mb-md-0">
                        @if($siswas->total() > 0)
                            Menampilkan {{ $siswas->firstItem() }}
                            sampai {{ $siswas->lastItem() }}
                            dari {{ $siswas->total() }} data siswa
                        @else
                            Tidak ada data untuk ditampilkan
                        @endif
                    </div>

                    <div>
                        {{ $siswas->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
