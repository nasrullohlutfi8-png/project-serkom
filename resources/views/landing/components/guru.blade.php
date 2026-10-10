<section id="guru" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold text-uppercase d-block mb-2">
                Tenaga Pendidik
            </span>
            <h2 class="fw-bold mt-2">
                Guru & Tenaga Kependidikan
            </h2>
            <p class="text-secondary mx-auto" style="max-width: 700px;">
                Tenaga pendidik SMAN 1 Padakembang yang berperan
                dalam mendampingi dan mengembangkan potensi peserta didik.
            </p>
        </div>

        @if(isset($guru) && $guru->count())
            {{-- Tambahkan inline style height: auto !important untuk melawan CSS 600px yang memaksa tadi --}}
            <div id="guruCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
                <div class="carousel-inner px-lg-5">
                    @foreach($guru->chunk(4) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: auto !important;">
                            <div class="row g-4 justify-content-center py-3">
                                @foreach($chunk as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="text-center bg-white p-4 rounded-4 shadow-sm h-100">
                                            @if($item->foto && $item->foto !== 'tidak ada')
                                                <img src="{{ asset('storage/guru/' . $item->foto) }}"
                                                     alt="{{ $item->nama_guru }}"
                                                     class="rounded-circle shadow-sm mb-3"
                                                     width="130"
                                                     height="130"
                                                     style="object-fit: cover;">
                                            @else
                                                <div class="rounded-circle bg-light shadow-sm d-flex align-items-center justify-content-center mx-auto mb-3"
                                                     style="width:130px; height:130px;">
                                                    <i class="fas fa-user fa-3x text-primary"></i>
                                                </div>
                                            @endif

                                            <h6 class="fw-bold mb-1 text-dark">
                                                {{ $item->nama_guru }}
                                            </h6>

                                            <small class="text-primary fw-semibold d-block mb-1">
                                                {{ $item->jabatan }}
                                            </small>

                                            @if($item->mapel)
                                                <div class="small text-secondary">
                                                    {{ $item->mapel }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Tombol Navigasi dengan posisi vertical centered yang aman --}}
                @if($guru->count() > 4)
                    <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#guruCarousel"
                            data-bs-slide="prev"
                            style="width: 40px; height: 40px; background-color: rgba(0,0,0,0.3); border-radius: 50%; top: 50%; transform: translateY(-50%); left: 10px; filter: invert(1);">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Sebelumnya</span>
                    </button>

                    <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#guruCarousel"
                            data-bs-slide="next"
                            style="width: 40px; height: 40px; background-color: rgba(0,0,0,0.3); border-radius: 50%; top: 50%; transform: translateY(-50%); right: 10px; filter: invert(1);">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Berikutnya</span>
                    </button>
                @endif
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('guru.public.index') }}"
                   class="btn btn-outline-primary px-4 rounded-pill">
                    Lihat Semua Guru
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-secondary mb-3"></i>
                <p class="text-secondary">
                    Data guru belum tersedia.
                </p>
            </div>
        @endif
    </div>
</section>