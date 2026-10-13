<section id="siswa" class="py-5 bg-light">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <span class="text-primary fw-semibold text-uppercase">
                Peserta Didik
            </span>

            <h2 class="fw-bold mt-2">
                Data Siswa
            </h2>

            <p class="text-secondary">
                Daftar peserta didik SMAN 1 Padakembang.
            </p>

        </div>

        {{-- TABEL SISWA --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-primary">
                            <tr>
                                <th class="py-3 px-4">No</th>
                                <th class="py-3">NISN</th>
                                <th class="py-3">Nama Siswa</th>
                                <th class="py-3">Kelas</th>
                                <th class="py-3">Jenis Kelamin</th>
                                <th class="py-3">Tahun Masuk</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($siswa as $item)

                                <tr>
                                    <td class="px-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->nisn }}
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $item->nama_siswa }}
                                    </td>

                                    <td>
                                        {{ $item->kelas->nama_kelas ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->jenis_kelamin }}
                                    </td>

                                    <td>
                                        {{ $item->tahun_masuk }}
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6"
                                        class="text-center py-4 text-secondary">
                                        Belum ada data siswa.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>