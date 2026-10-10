@extends('layouts.template')

@section('content')

{{-- Ukuran preview seragam untuk foto & video --}}
<style>
    .galeri-preview {
        width: 60px;
        height: 60px;
        object-fit: cover;   /* gambar dipotong proporsional, tidak gepeng/melar */
        display: block;
        border-radius: .35rem;
    }
</style>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-photo-video fa-sm mr-2 text-gray-500"></i>
        Data Galeri
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
                Tabel Daftar Galeri
            </h6>

            <div class="d-flex align-items-center flex-wrap">
                <!-- Form Pencarian Minimalis -->
                <form action="{{ route('galeri.index') }}" method="GET" class="form-inline mr-2 mb-2 mb-md-0">
                    <div class="input-group input-group-sm">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Cari judul, kategori..." 
                            value="{{ request('search') }}"
                            style="min-width: 220px;"
                        >
                        
                        @if(request('search'))
                            <div class="input-group-append">
                                <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary" title="Reset Pencarian">
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

                <a href="{{ route('galeri.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Galeri
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="15%" class="text-center">Preview</th>
                            <th>Judul</th>
                            <th width="12%" class="text-center">Kategori</th>
                            <th width="12%">Tanggal</th>
                            <th>Keterangan</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galeri as $index => $item)
                            <tr>
                                <td class="text-center">
                                    {{ method_exists($galeri, 'firstItem') ? $galeri->firstItem() + $index : $index + 1 }}
                                </td>
                                <td class="text-center">
                                    @if($item->kategori == 'Foto')
                                        <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}"
                                             class="galeri-preview img-thumbnail p-0 mx-auto">
                                    @else
                                        <video class="galeri-preview mx-auto" controls>
                                            <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                            Browser tidak mendukung tag video.
                                        </video>
                                    @endif
                                </td>
                                <td>{{ $item->judul }}</td>
                                <td class="text-center">
                                    @if($item->kategori == 'Foto')
                                        <span class="badge badge-pill badge-info px-3 py-2 shadow-sm"><i class="fas fa-image mr-1"></i> Foto</span>
                                    @else
                                        <span class="badge badge-pill badge-danger px-3 py-2 shadow-sm"><i class="fas fa-video mr-1"></i> Video</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ Str::limit($item->keterangan, 50) }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('galeri.edit', encryptId($item->id)) }}" class="btn btn-sm btn-warning mr-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('galeri.destroy', encryptId($item->id)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
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
                                            Data galeri dengan kata kunci <strong>{{ request('search') }}</strong> tidak ditemukan.
                                        @else
                                            Belum ada data galeri.
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bagian Pagination -->
            @if(method_exists($galeri, 'links'))
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                    <div class="text-muted small mb-2 mb-md-0">
                        @if($galeri->total() > 0)
                            Menampilkan {{ $galeri->firstItem() }} sampai {{ $galeri->lastItem() }} dari {{ $galeri->total() }} data galeri
                        @else
                            Tidak ada data untuk ditampilkan
                        @endif
                    </div>

                    <div>
                        {{ $galeri->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection