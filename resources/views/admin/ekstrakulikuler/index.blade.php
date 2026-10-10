@extends('layouts.template')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-futbol fa-sm mr-2 text-gray-500"></i>
        Data Ekstrakurikuler
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
        <!-- Card Header dengan Judul, Search Bar Minimalis, & Tombol Tambah -->
        <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">
                Tabel Daftar Ekstrakurikuler
            </h6>

            <div class="d-flex align-items-center flex-wrap">
                <!-- Form Pencarian Minimalis -->
                <form action="{{ route('ekstrakulikuler.index') }}" method="GET" class="form-inline mr-2 mb-2 mb-md-0">
                    <div class="input-group input-group-sm">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Cari eskul, pembina..." 
                            value="{{ request('search') }}"
                            style="min-width: 220px;"
                        >
                        
                        @if(request('search'))
                            <div class="input-group-append">
                                <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-outline-secondary" title="Reset Pencarian">
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

                <a href="{{ route('ekstrakulikuler.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i> Tambah Ekstrakurikuler
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="12%" class="text-center">Gambar</th>
                            <th>Nama Ekstrakurikuler</th>
                            <th>Pembina</th>
                            <th>Jadwal Latihan</th>
                            <th>Deskripsi</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($ekstrakulikuler as $index => $item)
                            <tr>
                                <td class="text-center">
                                    {{ method_exists($ekstrakulikuler, 'firstItem') ? $ekstrakulikuler->firstItem() + $index : $index + 1 }}
                                </td>

                                {{-- Gambar --}}
                                <td class="text-center">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/ekstrakulikuler/' . $item->gambar) }}" 
                                             alt="{{ $item->nama_eskul }}" 
                                             width="60" 
                                             height="60" 
                                             style="object-fit: cover;" 
                                             class="rounded">
                                    @else
                                        <span class="text-muted small">Tidak ada</span>
                                    @endif
                                </td>

                                {{-- Nama Ekstrakurikuler --}}
                                <td>{{ $item->nama_eskul }}</td>

                                {{-- Pembina --}}
                                <td>{{ $item->pembina }}</td>

                                {{-- Jadwal --}}
                                <td>{{ $item->jadwal_latihan }}</td>

                                {{-- Deskripsi --}}
                                <td>{{ Str::limit($item->deskripsi, 50) }}</td>

                                {{-- Aksi --}}
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('ekstrakulikuler.edit', encryptId($item->id)) }}" class="btn btn-warning btn-sm mr-1" title="Ubah">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('ekstrakulikuler.destroy', encryptId($item->id)) }}" 
                                              method="POST" 
                                              class="d-inline" 
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
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
                                            Data ekstrakurikuler dengan kata kunci <strong>{{ request('search') }}</strong> tidak ditemukan.
                                        @else
                                            Belum ada data ekstrakurikuler.
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bagian Pagination -->
            @if(method_exists($ekstrakulikuler, 'links'))
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                    <div class="text-muted small mb-2 mb-md-0">
                        @if($ekstrakulikuler->total() > 0)
                            Menampilkan {{ $ekstrakulikuler->firstItem() }} sampai {{ $ekstrakulikuler->lastItem() }} dari {{ $ekstrakulikuler->total() }} data ekstrakurikuler
                        @else
                            Tidak ada data untuk ditampilkan
                        @endif
                    </div>

                    <div>
                        {{ $ekstrakulikuler->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>

@endsection