<header class="site-header">
    <div class="header-container">
        <div class="header-content">
            <!-- Logo Section -->
            <div class="logo-section">
                <a href="{{ route('accueil') }}" class="logo-link">
                    <div class="logo-wrapper">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="EDAAG TRADING Logo" class="logo-img">
                    </div>
                    <div class="logo-text">
                        <h5 class="logo-title">EDAAG TRADING</h5>
                        <small class="logo-subtitle">Votre partenaire commercial</small>
                    </div>
                </a>
            </div>

            <!-- Navigation Desktop -->
            <nav class="main-nav d-none d-lg-flex">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ route('storefront') }}" class="nav-link {{ Request::route()->getName()=='storefront' ? 'active' : '' }}">
                            <span>Commander</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link {{ Request::route()->getName()=='about' ? 'active' : '' }}">
                            <span>À Propos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link {{ Request::route()->getName()=='contact' ? 'active' : '' }}">
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Actions Section -->
            <div class="header-actions">
                @if(!auth()->guard('catalogue')->user())
                    <a href="{{ route('catalogue.login') }}" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="d-none d-md-inline">Se connecter</span>
                    </a>
                @endif

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-label="Toggle menu">
                    <span class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="offcanvas offcanvas-end mobile-menu" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header">
            <div class="mobile-logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="EDAAG TRADING Logo" class="mobile-logo-img">
                <h5 class="mobile-logo-title">EDAAG TRADING</h5>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="mobile-nav">
                <ul class="mobile-nav-list">
                    <li class="mobile-nav-item">
                        <a href="{{ route('storefront') }}" class="mobile-nav-link {{ Request::route()->getName()=='storefront' ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Commander</span>
                        </a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="{{ route('about') }}" class="mobile-nav-link {{ Request::route()->getName()=='about' ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                            <i class="fas fa-info-circle"></i>
                            <span>À Propos</span>
                        </a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="{{ route('contact') }}" class="mobile-nav-link {{ Request::route()->getName()=='contact' ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                            <i class="fas fa-envelope"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                    <li class="mobile-nav-divider"></li>
                    @if(!auth()->guard('catalogue')->user())
                        <a href="{{ route('catalogue.login') }}" class="btn-login">
                            <i class="fas fa-sign-in-alt"></i>
                            <span class="d-none d-md-inline">Se connecter</span>
                        </a>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>

<link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">

<script>
    // Header scroll effect
    let lastScroll = 0;
    const header = document.querySelector('.site-header');

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        lastScroll = currentScroll;
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('.nav-link[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const headerOffset = 100;
                    const elementPosition = target.offsetTop;
                    const offsetPosition = elementPosition - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
</script>
