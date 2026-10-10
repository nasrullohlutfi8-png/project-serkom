@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-trophy fa-sm"></i> Data Prestasi</h1>

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
            <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Tabel Daftar Prestasi</h6>

            <div class="d-flex align-items-center flex-wrap">
                <!-- Form Pencarian Minimalis -->
                <form action="{{ route('prestasi.index') }}" method="GET" class="form-inline mr-2 mb-2 mb-md-0">
                    <div class="input-group input-group-sm">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Cari prestasi, tahun..." 
                            value="{{ request('search') }}"
                            style="min-width: 220px;"
                        >
                        
                        @if(request('search'))
                            <div class="input-group-append">
                                <a href="{{ route('prestasi.index') }}" class="btn btn-outline-secondary" title="Reset Pencarian">
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

                <a href="{{ route('prestasi.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Prestasi
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="12%" class="text-center">Foto</th>
                            <th>Nama Prestasi</th>
                            <th width="15%">Tahun Ajaran</th>
                            <th>Deskripsi</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prestasis as $index => $prestasi)
                        <tr>
                            <td class="text-center">
                                {{ method_exists($prestasis, 'firstItem') ? $prestasis->firstItem() + $index : $index + 1 }}
                            </td>
                            <td class="text-center align-middle">
                                {{-- Cek jika foto bukan bernilai 'tidak ada' dan filenya ada di storage --}}
                                @if($prestasi->foto !== 'tidak ada' && !empty($prestasi->foto) && \Illuminate\Support\Facades\Storage::disk('public')->exists('prestasi/' . $prestasi->foto))
                                    <img src="{{ asset('storage/prestasi/' . $prestasi->foto) }}"
                                        alt="{{ $prestasi->nama_prestasi }}"
                                        width="50" height="50"
                                        class="rounded"
                                        style="object-fit: cover;">
                                @else
                                    <span class="badge badge-secondary">tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $prestasi->nama_prestasi }}</td>
                            <td>{{ $prestasi->tahun_ajaran }}</td>
                            <td>{{ Str::limit($prestasi->deskripsi ?? '-', 50) }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('prestasi.edit', encryptId($prestasi->id)) }}" class="btn btn-warning btn-sm mr-1" title="Ubah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('prestasi.destroy', encryptId($prestasi->id)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-search fa-2x text-gray-400 mb-2"></i>
                                <p class="mb-0 text-muted">
                                    @if(request('search'))
                                        Data prestasi dengan kata kunci <strong>{{ request('search') }}</strong> tidak ditemukan.
                                    @else
                                        Belum ada data prestasi.
                                    @endif
                                </p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bagian Pagination -->
            @if(method_exists($prestasis, 'links'))
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                    <div class="text-muted small mb-2 mb-md-0">
                        @if($prestasis->total() > 0)
                            Menampilkan {{ $prestasis->firstItem() }} sampai {{ $prestasis->lastItem() }} dari {{ $prestasis->total() }} data prestasi
                        @else
                            Tidak ada data untuk ditampilkan
                        @endif
                    </div>

                    <div>
                        {{ $prestasis->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection