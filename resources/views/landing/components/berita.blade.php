<section id="berita" class="py-5 bg-light">

    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-5">

            <div>

                <span class="text-primary fw-semibold text-uppercase">
                    Informasi
                </span>

                <h2 class="fw-bold mt-2 mb-0">
                    Berita Terbaru
                </h2>

            </div>

            <a href="{{ route('berita.public.index') }}"
               class="btn btn-outline-primary rounded-pill px-4">

                Semua Berita

            </a>

        </div>

        @if(isset($berita) && $berita->count())

            <div class="row g-4">

                @foreach($berita as $index => $item)

                    @if($index === 0)

                        {{-- Berita utama --}}
                        <div class="col-lg-7">

                            <div class="position-relative overflow-hidden rounded-4">

                                @if($item->gambar)

                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                         class="w-100"
                                         style="height:420px; object-fit:cover;"
                                         alt="{{ $item->judul }}">

                                @else

                                    <div class="bg-secondary"
                                         style="height:420px;">
                                    </div>

                                @endif

                                <div class="position-absolute bottom-0 start-0 end-0 p-4 text-white"
                                     style="background:linear-gradient(transparent,rgba(0,0,0,.85));">

                                    <small>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </small>

                                    <h3 class="fw-bold mt-2">
                                        {{ $item->judul }}
                                    </h3>

                                    <p class="mb-3">
                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($item->isi),
                                            120
                                        ) }}
                                    </p>

                                    <a href="{{ route('berita.public.show', $item->slug) }}"
                                    class="btn btn-outline-primary rounded-pill px-4">

                                        Baca Selengkapnya

                                        <i class="fas fa-arrow-right ms-2"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    @else

                        {{-- Berita lainnya --}}
                        <div class="col-lg-5">

                            <div class="d-flex gap-3 mb-4">

                                @if($item->gambar)

                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                         class="rounded-3"
                                         width="150"
                                         height="120"
                                         style="object-fit:cover;"
                                         alt="{{ $item->judul }}">

                                @else

                                    <div class="bg-secondary rounded-3"
                                         style="width:150px;height:120px;">
                                    </div>

                                @endif

                                <div>

                                    <small class="text-primary">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </small>

                                    <h6 class="fw-bold mt-2">
                                        {{ $item->judul }}
                                    </h6>

                                    <p class="small text-secondary mb-0">

                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($item->isi),
                                            80
                                        ) }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        @else

            <div class="text-center py-5">

                <i class="fas fa-newspaper fa-3x text-secondary mb-3"></i>

                <p class="text-secondary">
                    Belum ada berita.
                </p>

            </div>

        @endif

    </div>

</section>