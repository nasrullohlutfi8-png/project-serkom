<section id="galeri" class="py-5">

    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-5">

            <div>

                <span class="text-primary fw-semibold text-uppercase">
                    Dokumentasi
                </span>

                <h2 class="fw-bold mt-2 mb-0">
                    Galeri Sekolah
                </h2>

            </div>

            <a href="#galeri"
               class="btn btn-outline-primary rounded-pill px-4">

                Lihat Semua

            </a>

        </div>

        @if(isset($galeri) && $galeri->count())

            <div class="row g-3 justify-content-center">

                @foreach($galeri as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="overflow-hidden rounded-4">

                            @if($item->file)

                                @if($item->kategori === 'Vidio')

                                    <video controls
                                           class="w-100"
                                           style="height:240px; object-fit:cover;">

                                        <source src="{{ asset('storage/' . $item->file) }}"
                                                type="video/mp4">

                                        Browser kamu tidak mendukung pemutaran video.

                                    </video>

                                @else

                                    <img src="{{ asset('storage/' . $item->file) }}"
                                         class="w-100"
                                         style="height:240px; object-fit:cover;"
                                         alt="{{ $item->judul }}">

                                @endif

                            @else

                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="height:240px;">

                                    <i class="fas fa-image fa-3x text-secondary"></i>

                                </div>

                            @endif

                        </div>

                        <div class="mt-2">

                            <h6 class="fw-bold mb-1">
                                {{ $item->judul }}
                            </h6>

                            <small class="text-secondary">

                                {{ $item->kategori ?? 'Dokumentasi Sekolah' }}

                                @if($item->tanggal)
                                    •
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                @endif

                            </small>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-5">

                <i class="fas fa-images fa-3x text-secondary mb-3"></i>

                <p class="text-secondary">
                    Belum ada dokumentasi.
                </p>

            </div>

        @endif

    </div>

</section>