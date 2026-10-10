@extends('layouts.template')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-newspaper fa-sm mr-2 text-gray-500"></i>
            Data Berita
        </h1>

        <a href="{{ route('berita.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>
            Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">

        <!-- Card Header dengan Judul & Search Bar yang Rapi -->
        <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-2 mb-md-0">
                <h6 class="m-0 font-weight-bold text-primary">
                    Daftar Berita
                </h6>
            </div>

            <!-- Form Pencarian Minimalis & Modern -->
            <form action="{{ route('berita.index') }}" method="GET" class="form-inline">
                <div class="input-group input-group-sm">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Cari berita..." 
                        value="{{ request('search') }}"
                        style="min-width: 220px;"
                    >
                    
                    @if(request('search'))
                        <div class="input-group-append">
                            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary" title="Reset Pencarian">
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
        </div>

        <div class="card-body">

            <!-- Informasi Total Data -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small">
                    @if(method_exists($berita, 'total'))
                        Total: <strong>{{ $berita->total() }}</strong> berita
                    @else
                        Total: <strong>{{ $berita->count() }}</strong> berita
                    @endif
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="15%" class="text-center">Gambar</th>
                            <th>Judul</th>
                            <th width="12%">Tanggal</th>
                            <th width="12%" class="text-center">Status</th>
                            <th width="15%">Penulis</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($berita as $index => $item)
                            <tr>
                                <td class="text-center">
                                    {{ method_exists($berita, 'firstItem') ? $berita->firstItem() + $index : $index + 1 }}
                                </td>

                                <td class="text-center">
                                    @if($item->gambar)
                                        <img 
                                            src="{{ asset('storage/' . $item->gambar) }}" 
                                            alt="Gambar Berita" 
                                            width="60" 
                                            height="60" 
                                            class="rounded"
                                            style="object-fit: cover;"
                                        >
                                    @else
                                        <span class="text-muted small">
                                            Tidak ada gambar
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <span class="font-weight-bold">
                                        {{ $item->judul }}
                                    </span>
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                </td>

                                <td class="text-center">
                                    @if($item->status == 'Pubish')
                                        <span class="badge badge-pill badge-success px-3 py-2">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Published
                                        </span>
                                    @else
                                        <span class="badge badge-pill badge-secondary px-3 py-2">
                                            <i class="fas fa-pen-alt mr-1"></i>
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $item->user->name ?? 'User Tidak Ditemukan' }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a 
                                            href="{{ route('berita.edit', encryptId($item->id)) }}" 
                                            class="btn btn-sm btn-warning mr-1" 
                                            title="Edit Berita"
                                        >
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>

                                        <form 
                                            action="{{ route('berita.destroy', encryptId($item->id)) }}" 
                                            method="POST" 
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button 
                                                type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                title="Hapus Berita"
                                            >
                                                <i class="fas fa-trash"></i>
                                                Hapus
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
                                            Berita dengan kata kunci <strong>{{ request('search') }}</strong> tidak ditemukan.
                                        @else
                                            Belum ada data berita.
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($berita, 'links'))
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                    <div class="text-muted small mb-2 mb-md-0">
                        @if($berita->total() > 0)
                            Menampilkan {{ $berita->firstItem() }} sampai {{ $berita->lastItem() }} dari {{ $berita->total() }} berita
                        @else
                            Tidak ada data untuk ditampilkan
                        @endif
                    </div>

                    <div>
                        {{ $berita->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>

</div>
@endsection