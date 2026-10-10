<style>
    .carousel-item {
        height: 600px;
    }

    .hero-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.45);
    }

    .hero-content {
        position: absolute;
        top: 50%;
        left: 7%;
        transform: translateY(-50%);
        color: white;
        max-width: 650px;
    }

    .hero-subtitle {
        color: #f5a400;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .hero-content h1 {
        font-size: 56px;
        font-weight: 700;
        line-height: 1.15;
        margin-bottom: 25px;
    }

    .hero-description {
        font-size: 21px;
        line-height: 1.5;
        margin-bottom: 30px;
    }
</style>
<section class=" bg-light" id="hero">
    <div class="">
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/hero1.png') }}" class="hero-image">

                <div class="hero-overlay"></div>

                <div class="hero-content">
                    <p class="hero-subtitle">BELAJAR & BERKARYA</p>

                    <h1>
                        Tempat Tumbuh Bakat<br>
                        dan Prestasi
                    </h1>

                    <p class="hero-description">
                        Kami menghadirkan pendidikan berkualitas yang
                        mengembangkan akademik, keterampilan, dan nilai
                        karakter untuk masa depan yang lebih cerah.
                    </p>

                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/hero2.png') }}" class="hero-image">

                <div class="hero-overlay"></div>

                <div class="hero-content">
                    <p class="hero-subtitle">PRESTASI SEKOLAH</p>

                    <h1>
                        Raih Prestasi<br>
                        Bersama Kami
                    </h1>

                    <p class="hero-description">
                        Kembangkan potensi dan raih prestasi melalui
                        berbagai kegiatan akademik maupun non-akademik.
                    </p>

                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/hero3.png') }}" class="hero-image">

                <div class="hero-overlay"></div>

                <div class="hero-content">
                    <p class="hero-subtitle">KEGIATAN SEKOLAH</p>

                    <h1>
                        Aktif, Kreatif,<br>
                        dan Berprestasi
                    </h1>

                    <p class="hero-description">
                        Ikuti berbagai kegiatan sekolah untuk mengembangkan
                        kreativitas, keterampilan, dan pengalaman.
                    </p>

                </div>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        </div>
    </div>
</section>