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

{{-- 

<section class="py-5 bg-light">
    <div class="container py-4">

        <div class="card border-0 shadow-sm rounded-4 mx-auto"
             style="max-width: 750px;">

            <div class="card-body p-4 p-md-5 text-center">

                <div class="rounded-circle bg-primary bg-opacity-10
                            text-primary d-inline-flex align-items-center
                            justify-content-center mb-3"
                     style="width: 100px; height: 100px;">

                    <i class="fas fa-user fa-3x"></i>

                </div>

                <h2 class="fw-bold mb-1">Lutfi Nasrulloh</h2>

                <p class="text-primary mb-4">
                    Pelajar PPLG | Web Developer Pemula
                </p>

                <p class="text-secondary">
                    Halo! Saya seorang pelajar yang tertarik pada dunia teknologi,
                    pemrograman, dan pengembangan website. Saya senang mempelajari
                    hal baru serta membuat aplikasi yang bermanfaat.
                </p>

                <hr class="my-4">

                <div class="text-start">

                    <p>
                        <i class="fas fa-graduation-cap text-primary me-2"></i>
                        <strong>Sekolah:</strong> SMKS YPC Tasikmalaya
                    </p>

                    <p>
                        <i class="fas fa-code text-primary me-2"></i>
                        <strong>Jurusan:</strong> Pengembangan Perangkat Lunak dan Gim
                    </p>

                    <p>
                        <i class="fas fa-laptop-code text-primary me-2"></i>
                        <strong>Minat:</strong> Web Development, Laravel, dan Database
                    </p>

                    <p class="mb-0">
                        <i class="fas fa-bullseye text-primary me-2"></i>
                        <strong>Tujuan:</strong> Menjadi pengembang aplikasi yang profesional
                    </p>

                </div>

                <a href="https://github.com/nasrullohlutfi8-png/project-serkom"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn btn-primary rounded-pill px-4 mt-4">

                    <i class="fab fa-github me-2"></i>
                    Lihat GitHub Saya

                </a>

            </div>

        </div>

    </div>
</section> --}}

