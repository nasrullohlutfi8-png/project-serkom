@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-scroll fa-sm mr-2 text-gray-500"></i>
        Data Pengumuman
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
                Tabel Daftar Pengumuman
            </h6>

            <div class="d-flex align-items-center flex-wrap">
                <!-- Form Pencarian Minimalis -->
                <form action="{{ route('pengumuman.index') }}" method="GET" class="form-inline mr-2 mb-2 mb-md-0">
                    <div class="input-group input-group-sm">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Cari judul, status, penulis..." 
                            value="{{ request('search') }}"
                            style="min-width: 220px;"
                        >
                        
                        @if(request('search'))
                            <div class="input-group-append">
                                <a href="{{ route('pengumuman.index') }}" class="btn btn-outline-secondary" title="Reset Pencarian">
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

                <a href="{{ route('pengumuman.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Pengumuman
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Judul</th>
                            <th width="12%">Tanggal</th>
                            <th width="15%" class="text-center">Status</th>
                            <th width="15%">Penulis</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengumuman as $index => $item)
                            <tr>
                                <td class="text-center">
                                    {{ method_exists($pengumuman, 'firstItem') ? $pengumuman->firstItem() + $index : $index + 1 }}
                                </td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    @if($item->status == 'Publish')
                                        <span class="badge badge-pill badge-success px-3 py-2 shadow-sm d-inline-flex align-items-center" style="font-weight: 600; letter-spacing: 0.5px;">
                                            <i class="fas fa-check-circle mr-1 align-middle"></i> Published
                                        </span>
                                    @else
                                        <span class="badge badge-pill badge-secondary px-3 py-2 shadow-sm d-inline-flex align-items-center text-white" style="font-weight: 600; letter-spacing: 0.5px; background-color: #6c757d;">
                                            <i class="fas fa-pen-alt mr-1 align-middle"></i> Draft
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $item->user->name ?? 'User Tidak Ditemukan' }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('pengumuman.edit', encryptId($item->id)) }}" class="btn btn-sm btn-warning mr-1" title="Edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        
                                        <form action="{{ route('pengumuman.destroy', encryptId($item->id)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-search fa-2x text-gray-400 mb-2"></i>
                                    <p class="mb-0 text-muted">
                                        @if(request('search'))
                                            Pengumuman dengan kata kunci <strong>{{ request('search') }}</strong> tidak ditemukan.
                                        @else
                                            Belum ada data pengumuman.
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bagian Pagination -->
            @if(method_exists($pengumuman, 'links'))
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                    <div class="text-muted small mb-2 mb-md-0">
                        @if($pengumuman->total() > 0)
                            Menampilkan {{ $pengumuman->firstItem() }} sampai {{ $pengumuman->lastItem() }} dari {{ $pengumuman->total() }} data pengumuman
                        @else
                            Tidak ada data untuk ditampilkan
                        @endif
                    </div>

                    <div>
                        {{ $pengumuman->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection