<section id="hero" class="hero section dark-background">

    <div class="info d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6 text-center">
                    <h2>Bienvenue Chez EDAAG TRADING</h2>
                    <p>SUN TOP est representé officiellement par EDAAG TRADING.</p>
                    <a href="{{ route('about') }}" class="btn-get-started">Voir Plus</a>
                </div>
            </div>
        </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item">
            <img src="{{ asset('assets/img/sliderphoto/globalphoto.png') }}" alt="">
        </div>

        <div class="carousel-item active">
            <img src="{{ asset('assets/img/sliderphoto/img1.png') }}" alt="">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('assets/img/sliderphoto/img2.png') }}" alt="">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('assets/img/sliderphoto/img4.png') }}" alt="">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('assets/img/sliderphoto/photo1.png') }}" alt="">
        </div>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>

</section>
