<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Halaman Login System">
    <meta name="author" content="">
    
    <title>Login - {{ $profilSekolah->nama_sekolah ?? 'Sistem Informasi Sekolah' }}</title>
    
    {{-- Favicon Sekolah dari Database --}}
    @if(!empty($profilSekolah->logo))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $profilSekolah->logo) }}">
    @endif

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        .bg-gradient-login {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }
        .school-logo {
            width: 75px;
            height: 75px;
            object-fit: contain;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="bg-gradient-login">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

            <div class="col-xl-5 col-lg-6 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    
                                    {{-- Bagian Logo dan Nama Sekolah dari Database --}}
                                    <div class="text-center mb-4">
                                        @if(!empty($profilSekolah->logo))
                                            <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo Sekolah" class="school-logo">
                                        @else
                                            <i class="fas fa-school fa-3x text-primary mb-3"></i>
                                        @endif
                                        <h3 class="h5 text-gray-900 font-weight-bold mb-1">
                                            {{ $profilSekolah->nama_sekolah ?? 'Nama Sekolah' }}
                                        </h3>
                                        <p class="text-muted small mb-0">Silakan login untuk masuk ke sistem</p>
                                    </div>

                                    {{-- Alert Sukses --}}
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    {{-- Alert Error Umum --}}
                                    @if($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <ul class="mb-0 pl-3">
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <form class="user" action="{{ route('login.store') }}" method="POST">
                                        @csrf

                                        {{-- Input Username / Name --}}
                                        <div class="form-group">
                                            <input type="text" name="name" 
                                                class="form-control form-control-user @error('name') is-invalid @enderror"
                                                id="exampleInputName" value="{{ old('name') }}"
                                                placeholder="Masukkan Username / Nama..." required autofocus>
                                            @error('name')
                                                <span class="invalid-feedback ml-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Input Password --}}
                                        <div class="form-group">
                                            <input type="password" name="password" 
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" required>
                                            @error('password')
                                                <span class="invalid-feedback ml-3" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Tombol Login --}}
                                        <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold shadow-sm">
                                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <small class="text-muted">&copy; {{ date('Y') }} {{ $profilSekolah->nama_sekolah ?? '' }}</small>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>