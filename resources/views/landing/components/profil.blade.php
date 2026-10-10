<section id="profil" class="py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- Foto --}}
            <div class="col-lg-6">

                <div class="position-relative">

                    @if($profilSekolah && $profilSekolah->foto)

                        <img src="{{ asset('storage/' . $profilSekolah->foto) }}"
                             alt="{{ $profilSekolah->nama_sekolah }}"
                             class="img-fluid rounded-4 shadow"
                             style="width: 100%; height: 430px; object-fit: cover;">

                    @else

                        <img src="{{ asset('assets/img/hero3.png') }}"
                             alt="Profil Sekolah"
                             class="img-fluid rounded-4 shadow"
                             style="width: 100%; height: 430px; object-fit: cover;">

                    @endif

                </div>

            </div>

            {{-- Informasi --}}
            <div class="col-lg-6">

                <span class="text-primary fw-semibold text-uppercase">
                    Tentang Sekolah
                </span>

                <h2 class="fw-bold mt-2 mb-4">
                    {{ $profilSekolah->nama_sekolah ?? 'SMAN 1 Padakembang' }}
                </h2>

                <p class="text-secondary lh-lg">
                    {{ $profilSekolah->deskripsi
                        ?? 'SMAN 1 Padakembang merupakan sekolah yang berkomitmen dalam memberikan pendidikan berkualitas serta mengembangkan potensi akademik dan non-akademik peserta didik.' }}
                </p>

                {{-- Statistik --}}
                <div class="row g-3 mt-4">

                    <div class="col-6">
                        <div class="p-3 border rounded-3">
                            <h3 class="fw-bold text-primary mb-1">
                                {{ $jumlahSiswa }}+
                            </h3>

                            <small class="text-secondary">
                                Siswa
                            </small>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="p-3 border rounded-3">
                            <h3 class="fw-bold text-primary mb-1">
                                {{ $jumlahGuru }}+
                            </h3>

                            <small class="text-secondary">
                                Guru & Tenaga Kependidikan
                            </small>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="p-3 border rounded-3">
                            <h3 class="fw-bold text-primary mb-1">
                                {{ $jumlahEskul }}+
                            </h3>

                            <small class="text-secondary">
                                Ekstrakurikuler
                            </small>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="p-3 border rounded-3">
                            <h3 class="fw-bold text-primary mb-1">
                                {{ $jumlahPrestasi }}+
                            </h3>

                            <small class="text-secondary">
                                Prestasi
                            </small>
                        </div>
                    </div>

                </div>

                <div class="mt-4">

                    <a href="{{ route('profil.public.index') }}"
                       class="btn btn-outline-primary px-4 py-2 rounded-pill">

                        Selengkapnya

                        <i class="fas fa-arrow-right ms-2"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>