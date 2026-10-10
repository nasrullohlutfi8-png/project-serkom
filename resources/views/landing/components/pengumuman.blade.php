<section id="pengumuman" class="py-5 bg-light">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- JUDUL --}}
            <div class="col-lg-4">

                <span class="text-primary fw-semibold text-uppercase">
                    Informasi Sekolah
                </span>

                <h2 class="fw-bold mt-2">
                    Pengumuman
                </h2>

                <p class="text-secondary mt-3">

                    Informasi penting dan pemberitahuan terbaru
                    untuk seluruh warga sekolah.

                </p>

            </div>

            {{-- DAFTAR PENGUMUMAN --}}
            <div class="col-lg-8">

                @if(isset($pengumuman) && $pengumuman->count())

                    {{-- AREA SCROLL --}}
                    <div
                        style="
                            max-height: 430px;
                            overflow-y: auto;
                            padding-right: 10px;
                        "
                    >

                        @foreach($pengumuman as $item)

                            <div class="d-flex gap-4 py-4 border-bottom">

                                {{-- TANGGAL --}}
                                <div class="text-center flex-shrink-0">

                                    <div class="text-primary fw-bold fs-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}
                                    </div>

                                    <small class="text-secondary">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M Y') }}
                                    </small>

                                </div>

                                {{-- ISI --}}
                                <div>

                                    <h5 class="fw-bold mb-2">
                                        {{ $item->judul }}
                                    </h5>

                                    <p class="text-secondary mb-0">

                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($item->isi),
                                            150
                                        ) }}

                                    </p>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <p class="text-secondary">
                        Belum ada pengumuman.
                    </p>

                @endif

            </div>

        </div>

    </div>

</section>