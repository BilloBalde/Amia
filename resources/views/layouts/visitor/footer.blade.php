<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <!-- Informations entreprise -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="EDAAG TRADING Logo" class="me-3" style="height: 40px; width: auto;">
                    <h5 class="mb-0">EDAAG TRADING</h5>
                </div>
                <p class="mb-3">Votre partenaire commercial de confiance pour tous vos besoins en produits et services.</p>
                <div class="d-flex">
                    <a href="#" class="text-light me-3 fs-5"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-light me-3 fs-5"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light me-3 fs-5"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-light fs-5"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Liens rapides -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Liens Rapides</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('accueil') }}" class="text-light text-decoration-none">Accueil</a></li>
                    <li class="mb-2"><a href="{{ route('storefront') }}" class="text-light text-decoration-none">Commander</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-light text-decoration-none">À Propos</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-light text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Nos Services</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><span class="text-light">Vente de produits</span></li>
                    <li class="mb-2"><span class="text-light">Livraison</span></li>
                    <li class="mb-2"><span class="text-light">Service client</span></li>
                    <li class="mb-2"><span class="text-light">Support technique</span></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Contactez-nous</h6>
                <div class="d-flex align-items-start mb-2">
                    <i class="fas fa-map-marker-alt me-3 mt-1"></i>
                    <span>Madina école gare voiture Dabola</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-phone me-3"></i>
                    <span>+224 610050512/ 661515196/ 623523654</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-envelope me-3"></i>
                    <span>edaagtrading0@gmail.com</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-clock me-3"></i>
                    <span>Lun-Sam: 8h-18h</span>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- Copyright -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} EDAAG TRADING. Tous droits réservés. Developpé par <a href="https://www.jineiyatech.com" target="_blank" class="text-light text-decoration-none">JINEIYATECH</a></p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-light text-decoration-none me-3">Politique de confidentialité</a>
                <a href="#" class="text-light text-decoration-none">Conditions d'utilisation</a>
            </div>
        </div>
    </div>
</footer>