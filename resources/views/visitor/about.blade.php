@extends('layouts.visitor.visitor')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

<!-- Hero Section -->
<div class="about-hero">
    <div class="about-hero-content">
        <h1>À Propos de Nous</h1>
        <p>Découvrez l'histoire et les valeurs qui guident EDAAG TRADING</p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class="current">À Propos</li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-container">
    <!-- Story Section -->
    <section class="story-section">
        <div class="story-content">
            <div class="story-text animate-fade-in">
                <span class="story-year">Depuis 2022</span>
                <h2 class="story-title">Notre Histoire</h2>
                <p class="story-description">
                    <strong>EDAAG TRADING</strong> est le représentant officiel de <strong>Polimax</strong> en Guinée. 
                    Depuis notre création en 2022, nous nous sommes engagés à fournir les meilleurs produits 
                    de qualité supérieure sur le marché guinéen.
                </p>
                <p class="story-description">
                    Notre mission est de rendre accessible à tous les familles guinéennes des produits de quincailleries 
                    de qualité supérieure à des prix compétitifs, tout en offrant un service client exceptionnel. Nous sommes fiers de notre engagement envers l'excellence et la satisfaction de nos clients, et nous continuons à travailler sans relâche pour être votre partenaire de confiance dans tous vos besoins de produits de quincailleries.
                </p>
                <ul class="story-features">
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Exportateur officiel de Polimax en Guinée</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Produits de qualité supérieure certifiés</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Service client exceptionnel et réactif</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Engagement envers l'excellence depuis 2022</span>
                    </li>
                </ul>
            </div>
            <div class="story-image animate-fade-in" style="animation-delay: 0.2s;">
                <img src="{{ asset('images/polimax2.jpg') }}" alt="EDAAG TRADING - Notre Histoire">
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section animate-fade-in" style="animation-delay: 0.3s;">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">2022</span>
                <div class="stat-label">Année de création</div>
            </div>
            <div class="stat-item">
                <span class="stat-number">100+</span>
                <div class="stat-label">Produits disponibles</div>
            </div>
            <div class="stat-item">
                <span class="stat-number">5000+</span>
                <div class="stat-label">Clients satisfaits</div>
            </div>
            <div class="stat-item">
                <span class="stat-number">24/7</span>
                <div class="stat-label">Support client</div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="section-header animate-fade-in">
            <h2 class="section-title">Nos Valeurs</h2>
            <p class="section-subtitle">
                Les principes qui guident notre entreprise et façonnent chaque décision que nous prenons
            </p>
        </div>

        <div class="values-grid">
            <div class="value-card animate-fade-in" style="animation-delay: 0.1s;">
                <div class="value-icon">
                    <i class="fas fa-award"></i>
                </div>
                <h3 class="value-title">Qualité Supérieure</h3>
                <p class="value-description">
                    Nous sélectionnons rigoureusement nos produits selon les plus hauts standards de qualité 
                    pour garantir votre satisfaction et votre bien-être.
                </p>
            </div>

            <div class="value-card animate-fade-in" style="animation-delay: 0.2s;">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="value-title">Intégrité</h3>
                <p class="value-description">
                    Nous menons nos affaires avec transparence, honnêteté et respect. Votre confiance est 
                    notre plus grande récompense.
                </p>
            </div>

            <div class="value-card animate-fade-in" style="animation-delay: 0.3s;">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="value-title">Service Client</h3>
                <p class="value-description">
                    Votre satisfaction est notre priorité. Notre équipe dévouée est toujours prête à vous 
                    accompagner et répondre à vos besoins.
                </p>
            </div>

            <div class="value-card animate-fade-in" style="animation-delay: 0.4s;">
                <div class="value-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="value-title">Innovation</h3>
                <p class="value-description">
                    Nous restons à la pointe de l'innovation pour vous offrir les meilleurs produits et 
                    services disponibles sur le marché.
                </p>
            </div>

            <div class="value-card animate-fade-in" style="animation-delay: 0.5s;">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="value-title">Engagement</h3>
                <p class="value-description">
                    Nous nous engageons envers nos clients, nos partenaires et notre communauté à maintenir 
                    les plus hauts standards d'excellence.
                </p>
            </div>

            <div class="value-card animate-fade-in" style="animation-delay: 0.6s;">
                <div class="value-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="value-title">Accessibilité</h3>
                <p class="value-description">
                    Nous croyons que des produits de qualité doivent être accessibles à tous. C'est pourquoi 
                    nous proposons des prix compétitifs sans compromettre la qualité.
                </p>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section animate-fade-in" style="animation-delay: 0.7s;">
        <div class="mission-content">
            <h2 class="mission-title">Notre Mission</h2>
            <p class="mission-text">
                Chez <strong>EDAAG TRADING</strong>, notre mission est de fournir des produits de quincailleries 
                de qualité supérieure qui enrichissent la vie des familles guinéennes. Nous nous engageons à 
                être votre partenaire de confiance dans tous vos besoins de quincailleries.
            </p>
            <div class="mission-highlight">
                <p style="font-size: 1.1rem; margin: 0; line-height: 1.8;">
                    <i class="fas fa-quote-left me-2"></i>
                    Offrir des produits de qualité supérieure à des prix compétitifs, avec un service client 
                    exceptionnel, tout en maintenant les plus hauts standards de satisfaction client.
                    <i class="fas fa-quote-right ms-2"></i>
                </p>
            </div>
        </div>
    </section>
</div>

<script>
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerOffset = 100;
                const elementPosition = target.offsetTop;
                const offsetPosition = elementPosition - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('.value-card, .stat-item').forEach(el => {
        observer.observe(el);
    });
</script>
@endsection
