@extends('layouts.landing')

@section('title', 'Profil Saya | SMAN 1 Padakembang')

@section('content')

    <div class="container mb-5" style="margin-top: 120px">
    <div class="card border-0 shadow-lg overflow-hidden rounded-4">
        <!-- Top Accent Bar -->
        <div class="bg-primary p-2"></div>

        <div class="card-body p-4 p-lg-5">
            <div class="row align-items-center g-4">

                <!-- Informasi Profil -->
                <div class="col-lg-7 order-2 order-lg-1">
                    <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill mb-3">
                        <i class="fas fa-graduation-cap me-1"></i> Siswa PPLG
                    </span>

                    <h2 class="display-6 fw-bold text-dark mb-2">
                        Halo, Saya <span class="text-primary">Lutfi Nasrulloh</span>
                    </h2>

                    <p class="text-secondary lead fs-6 mb-4">
                        Siswa SMKS YPC Tasikmalaya jurusan PPLG yang sedang fokus mendalami pemrograman dan pengembangan aplikasi web.
                    </p>

                    <div class="card bg-light border-0 rounded-3 p-3 mb-4">
                        <h6 class="fw-bold text-primary mb-3">
                            <i class="fas fa-user-circle me-2"></i>Detail Biodata
                        </h6>
                        <div class="row g-2">
                            <div class="col-sm-6">
                                <div class="p-2 bg-white rounded border-start border-primary border-4 shadow-sm">
                                    <small class="text-muted d-block">Nama Lengkap</small>
                                    <span class="fw-semibold text-dark">Lutfi Nasrulloh</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-2 bg-white rounded border-start border-primary border-4 shadow-sm">
                                    <small class="text-muted d-block">Sekolah</small>
                                    <span class="fw-semibold text-dark">SMKS YPC Tasikmalaya</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-2 bg-white rounded border-start border-info border-4 shadow-sm">
                                    <small class="text-muted d-block">Jurusan</small>
                                    <span class="fw-semibold text-dark">PPLG</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-2 bg-white rounded border-start border-info border-4 shadow-sm">
                                    <small class="text-muted d-block">Hobi / Fokus</small>
                                    <span class="fw-semibold text-dark">Belajar Teknologi</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Foto Profil -->
                <div class="col-lg-5 order-1 order-lg-2 text-center">
                    <div class="position-relative d-inline-block">
                        <img src="{{ asset('assets/img/upi.jpeg') }}"
                             class="img-fluid rounded shadow "
                             width="240"
                             alt="Foto Profil Lutfi Nasrulloh">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection