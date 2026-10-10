<section id="prestasi" class="py-5">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <span class="text-primary fw-semibold text-uppercase">
                Pencapaian
            </span>

            <h2 class="fw-bold mt-2">
                Prestasi Sekolah
            </h2>

            <p class="text-secondary mx-auto"
               style="max-width: 700px;">

                Berbagai pencapaian siswa SMAN 1 Padakembang
                dalam bidang akademik maupun non-akademik.

            </p>

        </div>


        {{-- DATA PRESTASI --}}
        @if(isset($prestasi) && $prestasi->count())

            <div class="row g-4">

                @foreach($prestasi as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="h-100 bg-white border rounded-4 overflow-hidden shadow-sm">

                            {{-- FOTO PRESTASI --}}
                            @if($item->foto && $item->foto !== 'tidak ada')

                                <img src="{{ asset('storage/prestasi/' . $item->foto) }}"
                                     class="w-100"
                                     style="height: 220px; object-fit: cover;"
                                     alt="{{ $item->nama_prestasi }}">

                            @else

                                {{-- PLACEHOLDER JIKA TIDAK ADA FOTO --}}
                                <div class="d-flex align-items-center justify-content-center bg-light"
                                     style="height: 220px;">

                                    <div class="text-center">

                                        <i class="fas fa-trophy fa-3x text-primary mb-2"></i>

                                        <p class="text-secondary small mb-0">
                                            Tidak ada foto
                                        </p>

                                    </div>

                                </div>

                            @endif


                            {{-- KONTEN --}}
                            <div class="p-4">

                                {{-- JUDUL + ICON --}}
                                <div class="d-flex justify-content-between align-items-start">

                                    <div class="pe-3">

                                        <span class="badge bg-primary text-dark">
                                            Prestasi
                                        </span>

                                        <h5 class="fw-bold mt-3 mb-2">

                                            {{ $item->nama_prestasi }}

                                        </h5>

                                    </div>

                                    <div class="text-primary fs-3">

                                        <i class="fas fa-trophy"></i>

                                    </div>

                                </div>


                                {{-- TAHUN AJARAN --}}
                                @if($item->tahun_ajaran)

                                    <div class="text-secondary small mb-3">

                                        <i class="far fa-calendar me-1"></i>

                                        {{ $item->tahun_ajaran }}

                                    </div>

                                @endif


                                {{-- DESKRIPSI --}}
                                <p class="text-secondary small mb-0">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->deskripsi ?? ''),
                                        120
                                    ) }}

                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- TOMBOL LIHAT SEMUA --}}
            <div class="text-center mt-5">

                <a href="{{ route('prestasi.public.index') }}"
                   class="btn btn-outline-primary rounded-pill px-4">

                    Lihat Semua Prestasi

                    <i class="fas fa-arrow-right ms-2"></i>

                </a>

            </div>


        {{-- JIKA BELUM ADA DATA --}}
        @else

            <div class="text-center py-5">

                <i class="fas fa-trophy fa-3x text-secondary mb-3"></i>

                <p class="text-secondary mb-0">
                    Belum ada data prestasi.
                </p>

            </div>

        @endif

    </div>

</section>