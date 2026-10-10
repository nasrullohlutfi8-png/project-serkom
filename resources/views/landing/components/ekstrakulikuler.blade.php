<section id="ekstrakulikuler" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold text-uppercase">
                Kegiatan Siswa
            </span>

            <h2 class="fw-bold mt-2">
                Ekstrakurikuler
            </h2>

            <p class="text-secondary mx-auto"
               style="max-width: 700px;">

                Berbagai kegiatan untuk mengembangkan minat,
                bakat, kreativitas, dan karakter siswa.

            </p>

        </div>

        @if(isset($ekstrakulikuler) && $ekstrakulikuler->count())

            <div class="row g-4">

                @foreach($ekstrakulikuler as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="card border-0 shadow-sm h-100 overflow-hidden">

                            @if($item->gambar)

                                <img src="{{ asset('storage/ekstrakulikuler/' . $item->gambar) }}"
                                     class="w-100"
                                     style="height:220px; object-fit:cover;"
                                     alt="{{ $item->nama_eskul }}">

                            @else

                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="height:220px;">

                                    <i class="fas fa-school fa-3x text-secondary"></i>

                                </div>

                            @endif

                            <div class="card-body p-4">

                                <h5 class="fw-bold mb-3">
                                    {{ $item->nama_eskul }}
                                </h5>

                                <div class="small text-secondary mb-2">

                                    <i class="fas fa-user me-2 text-primary"></i>

                                    Pembina:
                                    {{ $item->pembina }}

                                </div>

                                <div class="small text-secondary mb-3">

                                    <i class="fas fa-clock me-2 text-primary"></i>

                                    {{ $item->jadwal_latihan }}

                                </div>

                                <p class="text-secondary small mb-0">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->deskripsi),
                                        120
                                    ) }}

                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="text-center mt-5">

                <a href="{{ route('ekstrakulikuler.public.index') }}"
                   class="btn btn-outline-primary rounded-pill px-4">

                    Lihat Semua Ekstrakurikuler

                    <i class="fas fa-arrow-right ms-2"></i>

                </a>

            </div>

        @endif

    </div>

</section>