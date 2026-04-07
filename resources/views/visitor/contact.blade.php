@extends('layouts.visitor.visitor')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">

<!-- Hero Section -->
<div class="contact-hero">
    <div class="contact-hero-content">
        <h1>Contactez-nous</h1>
        <p>Nous sommes là pour répondre à toutes vos questions</p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class="current">Contact</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Contact Info Section -->
<div class="contact-info-section">
    <div class="contact-info-grid">
        <!-- Address Card -->
        <div class="info-card animate-fade-in">
            <div class="info-card-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3>Adresse</h3>
            <p>Guinée Conakry, Madina école <br>Gare Voiture Dabola</p>
        </div>

        <!-- Phone Card -->
        <div class="info-card animate-fade-in" style="animation-delay: 0.1s;">
            <div class="info-card-icon">
                <i class="fas fa-phone"></i>
            </div>
            <h3>Appelez-nous</h3>
            <p>
                <a href="tel:+224610050512">+224 610050512/ 661515196/ 623523654</a>
            </p>
        </div>

        <!-- Email Card -->
        <div class="info-card animate-fade-in" style="animation-delay: 0.2s;">
            <div class="info-card-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h3>Email</h3>
            <p>
                <a href="mailto:edaagtrading0@gmail.com">edaagtrading0@gmail.com</a>
            </p>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="contact-form-section animate-fade-in" style="animation-delay: 0.3s;">
        <h2 class="section-title">Envoyez-nous un message</h2>
        <p class="section-subtitle">Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais</p>

        @include('layouts.flash')

        <form action="{{ route('sendEmail') }}" method="POST" class="contact-form">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="name">
                            <i class="fas fa-user me-2"></i>Votre Nom *
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="Entrez votre nom complet"
                            required
                        >
                        @error('name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="email">
                            <i class="fas fa-envelope me-2"></i>Votre Email *
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="votre.email@exemple.com"
                            required
                        >
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="subject">
                            <i class="fas fa-tag me-2"></i>Sujet *
                        </label>
                        <input
                            type="text"
                            name="subject"
                            id="subject"
                            class="form-control"
                            value="{{ old('subject') }}"
                            placeholder="Sujet de votre message"
                            required
                        >
                        @error('subject')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="message">
                            <i class="fas fa-comment-alt me-2"></i>Message *
                        </label>
                        <textarea
                            name="message"
                            id="message"
                            class="form-control"
                            rows="6"
                            placeholder="Écrivez votre message ici..."
                            required
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Form validation enhancement
    document.querySelector('.contact-form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('.btn-submit');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Envoi en cours...';
        submitBtn.disabled = true;
        
        // Re-enable after 5 seconds in case of error
        setTimeout(() => {
            if (submitBtn.disabled) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        }, 5000);
    });

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

    // Add focus effects to form inputs
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
</script>
@endsection
