<section id="projects" class="projects section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Nos produits </h2>
        <p>Voici une liste de nos produits Suntop disponibles en Stock</p>
    </div><!-- End Section Title -->

    <div class="container" >

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">TOUT</li>
            @foreach ($categories as $item)
            <li data-filter="">{{ strtoupper($item->slug) }}</li>
            @endforeach
            <li data-filter=".filter-remodeling">ENFANTS</li>
            <li data-filter=".filter-construction">ADULTES</li>
            <li data-filter=".filter-repairs">FAMILLE</li>

        </ul><!-- End Portfolio Filters -->

        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/enfant1.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{ ucfirst($item->slug) }}</h4>
                        <p>Produits pour les {{ ucfirst($item->slug) }}</p>
                        <a href="{{ asset('assets/img/projects/enfant1.png') }}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-construction">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/adulte.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Adultes</h4>
                        <p>Produits pour les adultes</p>
                        <a href="{{ asset('assets/img/projects/adulte.png') }}" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-repairs">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/enfant4.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Famille</h4>
                        <p>Produit pour la famille</p>
                        <a href="{{ asset('assets/img/projects/enfant4.png') }}" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/enfant2.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Enfant </h4>
                        <p>Produits pour les enfants</p>
                        <a href="{{ asset('assets/img/projects/enfant2.png') }}" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-construction">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/adulte1.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Adultes</h4>
                        <p>Produits pour les adultes</p>
                        <a href="{{ asset('assets/img/projects/adulte1.png') }}" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-repairs">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/enfant5.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Famille</h4>
                        <p>produit pour la famille</p>
                        <a href="{{ asset('assets/img/projects/enfant5.png') }}" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/enfant3.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Enfant</h4>
                        <p>Produits pour les enfants</p>
                        <a href="{{ asset('assets/img/projects/enfant3.png') }}" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-construction">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/adulte2.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Adultes</h4>
                        <p>Produits pour les adultes</p>
                        <a href="{{ asset('assets/img/projects/adulte2.png') }}" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-repairs">
                <div class="portfolio-content h-100">
                    <img src="{{ asset('assets/img/projects/famille.png') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Famille</h4>
                        <p>Produits pour la famille</p>
                        <a href="{{ asset('assets/img/projects/famille.png') }}" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="{{ route('productDetail') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div><!-- End Portfolio Item -->

        </div><!-- End Portfolio Container -->

      </div>

    </div>

</section><!-- /Projects Section -->
