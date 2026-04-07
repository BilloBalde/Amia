@extends('layouts.visitor.visitor')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/storefront.css') }}">
@php
    $catalogueCustomer = auth()->guard('catalogue')->user();
@endphp

<!-- Enhanced Hero Section -->
<div class="hero-section" id="accueil">
    <div class="hero-content">
        <h1 class="hero-title">EDAAG TRADING</h1>
        <p class="hero-subtitle">Exportateur officiel de POLIMAX en GUINEE</p>
        <p class="hero-subtitle">Votre partenaire de confiance depuis 2022</p>

        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">{{ $products->count() }}</span>
                <div class="stat-label">Produits</div>
            </div>
            <div class="stat-item">
                <span class="stat-number">{{ $categories->count() }}</span>
                <div class="stat-label">Catégories</div>
            </div>
            <div class="stat-item">
                <span class="stat-number">2022</span>
                <div class="stat-label">Année de création</div>
            </div>
        </div>
    </div>
</div>

<div class="section-container">
    <div class="d-flex justify-content-end mb-3" style="gap:10px; flex-wrap:wrap;">
        @if($catalogueCustomer)
            <a href="{{ route('catalogue.orders') }}" class="btn btn-secondary">Mes commandes</a>
            <form method="POST" action="{{ route('catalogue.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-secondary">Déconnexion</button>
            </form>
        @else
            <a href="{{ route('catalogue.login') }}" class="btn btn-secondary">Se connecter</a>
            <a href="{{ route('catalogue.register') }}" class="btn btn-outline-secondary">Créer un compte</a>
        @endif
    </div>
    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success animate-slide-up">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Succès!</strong> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger animate-slide-up">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Erreur!</strong> {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger animate-slide-up">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Erreur!</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Enhanced Products Section -->
    <section id="produits" class="products-section animate-fade-in">
        <h2 class="section-title">Catalogue Produits</h2>
        <p class="section-subtitle">Découvrez notre sélection de produits de qualité supérieure</p>

        <div class="mb-3" style="max-width: 420px;">
            <label class="form-label"><strong>Boutique</strong></label>
            <select id="storeSelect" class="form-control">
                @foreach(($stores ?? []) as $s)
                    <option value="{{ $s->id }}" {{ !empty($selectedStore?->id) && $selectedStore->id == $s->id ? 'selected' : '' }}>
                        {{ $s->store_name }}
                    </option>
                @endforeach
            </select>
            @if(!empty($selectedStore))
                <small class="text-muted d-block mt-1">Boutique sélectionnée: {{ $selectedStore->store_name }}</small>
            @endif
        </div>

        <div class="filters">
            <button class="filter-btn active" data-filter="all">
                <i class="fas fa-th me-2"></i>Tout
            </button>
            @foreach ($categories as $category)
                <button class="filter-btn" data-filter="{{ $category->slug }}">
                    <i class="fas fa-tag me-2"></i>{{ strtoupper($category->slug) }}
                </button>
            @endforeach
        </div>

        <div class="products-grid">
            @forelse($products as $product)
                @php
                    $unitPrice = (float) ($product->price_sale_ctn ?? 0);
                    $categoryLabel = $product->categories->first()?->slug;
                    $categorySlugs = $product->categories->pluck('slug')->implode(' ');
                    $imagePath = $product->image ? asset('products/' . $product->image) : asset('assets/img/no-image.jpg');
                @endphp
                <div class="product-card animate-scale-in" data-category="{{ $categorySlugs }}">
                    <div class="product-image-container">
                        <img class="product-image" src="{{ $imagePath }}" alt="{{ $product->libelle }}" loading="lazy">
                        @if($categoryLabel)
                            <span class="product-category">{{ $categoryLabel }}</span>
                        @endif
                        @if(!empty($selectedStore))
                            <span class="product-category" style="left:auto; right:12px; background:rgba(0,0,0,0.55);">
                                {{ $selectedStore->store_name }}
                            </span>
                        @endif
                    </div>

                    <div class="product-content">
                        <h3 class="product-name">{{ $product->libelle }}</h3>

                        @if($product->description)
                            <p class="product-description">
                                {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                            </p>
                        @endif

                        @if($unitPrice > 0)
                            <p class="product-price">
                                {{ numberDelimiter($unitPrice) }} FG
                            </p>
                        @else
                            <p class="product-price" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                Prix sur demande
                            </p>
                        @endif

                        @php
                            $qtyPerCtn = (int) ($product->qtityCtn ?? 1);
                            if ($qtyPerCtn <= 0) { $qtyPerCtn = 1; }
                        @endphp

                        <div class="product-qty-picker" style="display:flex; gap:10px; align-items:center; margin: 10px 0 14px;">
                            <select
                                id="unit_{{ $product->id }}"
                                class="form-control"
                                style="max-width: 140px;"
                                @if($qtyPerCtn <= 1) disabled @endif
                                title="@if($qtyPerCtn <= 1) Ce produit n'a pas de conditionnement carton @endif"
                            >
                                <option value="pcs" selected>PCS</option>
                                <option value="ctn">Carton</option>
                            </select>
                            <input
                                id="qty_{{ $product->id }}"
                                type="number"
                                class="form-control"
                                style="max-width: 140px;"
                                min="1"
                                step="1"
                                value="1"
                                inputmode="numeric"
                                pattern="[0-9]*"
                                aria-label="Quantité"
                            >
                        </div>

                        <div class="product-qty-quick" style="display:flex; flex-wrap:wrap; gap:8px; margin-top:-6px; margin-bottom:10px;">
                            <button type="button" class="btn btn-sm btn-light" onclick="setPick({{ $product->id }}, 'pcs', 4)">4 PCS</button>
                            <button type="button" class="btn btn-sm btn-light" onclick="setPick({{ $product->id }}, 'pcs', 5)">5 PCS</button>
                            @if($qtyPerCtn > 1)
                                <button type="button" class="btn btn-sm btn-light" onclick="setPick({{ $product->id }}, 'ctn', 1)">1 Carton</button>
                                <button type="button" class="btn btn-sm btn-light" onclick="setPick({{ $product->id }}, 'ctn', 2)">2 Cartons</button>
                            @endif
                        </div>
                        @if($qtyPerCtn > 1)
                            <small class="text-muted" style="display:block; margin-top:-8px; margin-bottom:10px;">
                                1 carton = {{ $qtyPerCtn }} PCS
                            </small>
                        @endif

                        <button
                            type="button"
                            class="btn-add-to-cart"
                            onclick="addToCart({{ $product->id }}, '{{ addslashes($product->libelle) }}', {{ $unitPrice }}, {{ $qtyPerCtn }})"
                            @if($unitPrice <= 0) disabled @endif
                        >
                            <i class="fas fa-cart-plus me-2"></i>
                            @if($unitPrice > 0)
                                Ajouter au panier
                            @else
                                Contactez-nous
                            @endif
                        </button>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Aucun produit disponible</h4>
                    <p class="text-muted">Nous travaillons à enrichir notre catalogue. Revenez bientôt !</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Enhanced Order Form Section -->
    <section id="commander" class="order-section">
        <div class="order-form-container">
            <h2 class="section-title">Finaliser votre commande</h2>
            <p class="section-subtitle">Remplissez le formulaire ci-dessous pour passer votre commande</p>

            <form action="{{ route('storefront.store') }}" method="POST" id="orderForm">
                @csrf
                <input type="hidden" name="store_id" id="store_id" value="{{ $selectedStore?->id }}">

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="customer_name">
                            <i class="fas fa-user me-2"></i>Nom complet *
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="customer_name"
                            name="customer_name"
                            value="{{ old('customer_name', $catalogueCustomer?->name) }}"
                            placeholder="Entrez votre nom complet"
                            {{ $catalogueCustomer ? 'readonly' : 'required' }}
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone">
                            <i class="fas fa-phone me-2"></i>Téléphone
                        </label>
                        <input
                            type="tel"
                            class="form-control"
                            id="phone"
                            name="phone"
                            value="{{ old('phone', $catalogueCustomer?->phone) }}"
                            placeholder="+224 XXX XXX XXX"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="address">
                            <i class="fas fa-map-marker-alt me-2"></i>Adresse de livraison
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="address"
                            name="address"
                            value="{{ old('address', $catalogueCustomer?->address) }}"
                            placeholder="Votre adresse complète"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="notes">
                            <i class="fas fa-sticky-note me-2"></i>Notes supplémentaires
                        </label>
                        <textarea
                            class="form-control"
                            id="notes"
                            name="notes"
                            rows="4"
                            placeholder="Informations supplémentaires sur votre commande (optionnel)..."
                        >{{ old('notes') }}</textarea>
                    </div>
                </div>

                <!-- Enhanced Cart Section -->
                <div class="cart-section">
                    <div class="cart-header">
                        <h3 class="cart-title">
                            <i class="fas fa-shopping-cart me-2"></i>Votre panier
                        </h3>
                    </div>

                    <div id="cartItems"></div>
                </div>

                <div class="total-section">
                    <div class="total-label">Total de la commande</div>
                    <div class="total-amount" id="totalAmount">0 FG</div>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn" disabled>
                    <i class="fas fa-paper-plane me-2"></i>
                    Confirmer la commande
                </button>
            </form>
        </div>
    </section>

    <!-- Enhanced About Section -->
    <section id="apropos" class="about-section">
        <div class="about-content">
            <h2 class="about-title">À Propos de EDAAG TRADING</h2>

            <div class="about-description">
                <p>
                    Nous sommes <strong>EDAAG TRADING</strong>, exportateur officiel de <strong>POLIMAX GUINEE</strong>.
                    Nous distribuons une large gamme de produits répondant aux besoins des professionnels et des particuliers, incluant des outils, ferronnerie, plomberie, électricité et bien plus encore.
                    Depuis <strong>2022</strong>, nous nous engageons à fournir des solutions durables et fiables sur le marché guinéen.
                </p>
                <p>
                    Notre mission est de vous offrir des produits de qualité supérieure à des prix compétitifs, avec un service client exceptionnel. Nous nous engageons à maintenir les plus hauts standards de satisfaction client et à vous accompagner dans tous vos projets de construction et de rénovation.
                </p>
            </div>

            <div class="about-features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4 class="feature-title">Qualité Supérieure</h4>
                    <p class="feature-description">
                        Nos produits sont sélectionnés selon les plus hauts standards de qualité
                        pour garantir votre satisfaction.
                    </p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h4 class="feature-title">Livraison Rapide</h4>
                    <p class="feature-description">
                        Service de livraison efficace et fiable pour vous faire parvenir
                        vos commandes dans les meilleurs délais.
                    </p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="feature-title">Support Client</h4>
                    <p class="feature-description">
                        Notre équipe est à votre disposition pour vous accompagner
                        et répondre à toutes vos questions.
                    </p>
                    <p>
                        Contactez-nous dès aujourd'hui aux numéros suivants : +224 610050512/ 661515196/ 623523654 ou par email à l'adresse suivante : contact@edaagtrading.com.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    // Store selection drives which boutique is used for the order
    const storeSelect = document.getElementById('storeSelect');
    if (storeSelect) {
        storeSelect.addEventListener('change', function () {
            const url = new URL(window.location.href);
            url.searchParams.set('store_id', this.value);
            window.location.href = url.toString();
        });
    }

    // Enhanced filtering with animations
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.dataset.filter;
            const productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.8)';

                setTimeout(() => {
                    if (filter === 'all') {
                        card.style.display = '';
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    } else {
                        const cats = (card.dataset.category || '').split(' ');
                        if (cats.includes(filter)) {
                            card.style.display = '';
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                }, 150);
            });
        });
    });

    // Petite fonction utilitaire pour échapper le HTML (sécurité)
    function escapeHtml(unsafe) {
        return unsafe.replace(/[&<>"]/g, function(m) {
            if(m === '&') return '&amp;';
            if(m === '<') return '&lt;';
            if(m === '>') return '&gt;';
            if(m === '"') return '&quot;';
            return m;
        });
    }

    let cart = [];

    function setPick(productId, unit, qty) {
        const qtyInput = document.getElementById(`qty_${productId}`);
        const unitSelect = document.getElementById(`unit_${productId}`);
        if (unitSelect && !unitSelect.disabled) unitSelect.value = unit;
        if (qtyInput) qtyInput.value = qty;
    }

    // Enhanced add to cart with animation
    function addToCart(productId, productName, unitPrice, qtyPerCtn = 1) {
        const qtyInput = document.getElementById(`qty_${productId}`);
        const unitSelect = document.getElementById(`unit_${productId}`);

        const rawQty = qtyInput ? parseInt(qtyInput.value, 10) : 1;
        const pickedQty = (Number.isFinite(rawQty) && rawQty > 0) ? rawQty : 1;
        const mode = unitSelect ? unitSelect.value : 'pcs';

        const qpc = (Number.isFinite(parseInt(qtyPerCtn, 10)) && parseInt(qtyPerCtn, 10) > 0) ? parseInt(qtyPerCtn, 10) : 1;
        const pcsToAdd = (mode === 'ctn') ? (pickedQty * qpc) : pickedQty;
        const cartonsToAdd = (mode === 'ctn') ? pickedQty : 0;

        const existingItem = cart.find(item => item.product_id === productId);

        if (existingItem) {
            existingItem.quantity += pcsToAdd;
            if (cartonsToAdd > 0) {
                existingItem.cartons = (existingItem.cartons || 0) + cartonsToAdd;
            }
        } else {
            cart.push({
                product_id: productId,
                name: productName,
                unit_price: unitPrice,
                quantity: pcsToAdd,
                cartons: cartonsToAdd,
                qty_per_ctn: qpc
            });
        }

        // Show success animation
        if (mode === 'ctn') {
            showNotification(`Ajouté: ${pickedQty} carton(s) (${pcsToAdd} PCS)`, 'success');
        } else {
            showNotification(`Ajouté: ${pcsToAdd} PCS`, 'success');
        }
        updateCart();
    }

    function updateQuantity(index, quantity) {
        const q = parseInt(quantity, 10);
        if (isNaN(q) || q <= 0) {
            removeFromCart(index);
        } else {
            cart[index].quantity = q;
            updateCart();
        }
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        showNotification('Produit retiré du panier', 'info');
        updateCart();
    }

    function updateCart() {
        const cartItemsDiv = document.getElementById('cartItems');
        const totalAmountDiv = document.getElementById('totalAmount');
        const submitBtn = document.getElementById('submitBtn');

        if (cart.length === 0) {
            // Panier vide - affichage attractif
            cartItemsDiv.innerHTML = `
                <div class="cart-empty">
                    <div class="cart-empty-icon">🛒</div>
                    <h4>Votre panier est vide</h4>
                    <p>Parcourez notre catalogue et ajoutez des produits.</p>
                    <a href="#produits" class="btn btn-primary btn-sm" onclick="document.querySelector('#produits').scrollIntoView({behavior: 'smooth'});return false;">
                        <i class="fas fa-arrow-down me-2"></i>Voir les produits
                    </a>
                </div>
            `;
            totalAmountDiv.textContent = '0 FG';
            submitBtn.disabled = true;
            return;
        }

        let html = '';
        let total = 0;

        cart.forEach((item, index) => {
            const lineTotal = item.unit_price * item.quantity;
            total += lineTotal;

            // Construction de chaque ligne du panier
            html += `
                <div class="cart-item animate-slide-up" data-index="${index}">
                    <div class="cart-item-row">
                        <div class="cart-item-col-info">
                            <div class="cart-item-name">${escapeHtml(item.name)}</div>
                            <div class="cart-item-price">${formatNumber(item.unit_price)} FG / unité</div>
                            ${item.qty_per_ctn && item.qty_per_ctn > 1 ? 
                                `<div class="cart-item-meta">1 carton = ${item.qty_per_ctn} PCS</div>` : ''}
                        </div>
                        <div class="cart-item-col-qty">
                            <div class="quantity-wrapper">
                                <button type="button" class="qty-btn" onclick="updateQuantity(${index}, ${item.quantity - 1})" ${item.quantity <= 1 ? 'disabled' : ''}>−</button>
                                <input type="number" class="qty-input" value="${item.quantity}" min="1" step="1" 
                                    inputmode="numeric" onchange="updateQuantity(${index}, this.value)">
                                <button type="button" class="qty-btn" onclick="updateQuantity(${index}, ${item.quantity + 1})">+</button>
                            </div>
                        </div>
                        <div class="cart-item-col-total">
                            <div class="cart-item-subtotal">${formatNumber(lineTotal)} FG</div>
                        </div>
                        <div class="cart-item-col-action">
                            <button type="button" class="cart-item-remove" onclick="removeFromCart(${index})" title="Retirer du panier">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Champs cachés pour le formulaire -->
                    <input type="hidden" name="items[${index}][product_id]" value="${item.product_id}">
                    <input type="hidden" name="items[${index}][quantity]" value="${item.quantity}">
                </div>
            `;
        });

        // Total et bouton de confirmation
        cartItemsDiv.innerHTML = html + `
            <div class="cart-footer">
                <div class="cart-total">
                    <span>Total :</span>
                    <strong class="total-amount">${formatNumber(total)} FG</strong>
                </div>
            </div>
        `;

        totalAmountDiv.textContent = formatNumber(total) + ' FG';
        submitBtn.disabled = false;
    }



    function removeFromCart(index) {
        const item = document.querySelector(`.cart-item[data-index="${index}"]`);
        if (item) {
            item.style.transition = 'all 0.3s';
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            setTimeout(() => {
                cart.splice(index, 1);
                updateCart();
            }, 300);
        } else {
            cart.splice(index, 1);
            updateCart();
        }
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }

    // Notification system
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'info'} notification-toast`;
        notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'} me-2"></i>
            ${message}
        `;

        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            max-width: 400px;
            animation: slideInRight 0.5s ease;
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.5s ease';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 500);
        }, 3000);
    }

    // Smooth scrolling with offset for fixed header
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

    // Enhanced form validation
    document.getElementById('orderForm').addEventListener('submit', function(e) {
        if (cart.length === 0) {
            e.preventDefault();
            showNotification('Veuillez ajouter au moins un produit à votre panier.', 'danger');
            return false;
        }

        const customerName = document.getElementById('customer_name').value.trim();
        if (!customerName) {
            e.preventDefault();
            showNotification('Veuillez saisir votre nom complet.', 'danger');
            document.getElementById('customer_name').focus();
            return false;
        }

        // Show loading state
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Traitement...';
        submitBtn.disabled = true;
    });

    // Add loading animation for images
    document.querySelectorAll('.product-image').forEach(img => {
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });
        img.style.opacity = '0';
        img.style.transition = 'opacity 0.3s ease';
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
    document.querySelectorAll('.product-card, .feature-item').forEach(el => {
        observer.observe(el);
    });

    // Initialize cart
    updateCart();

    // Add notification styles
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        .notification-toast {
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            backdrop-filter: blur(10px);
        }
    `;
    document.head.appendChild(style);
    </script>
    <style>
    /* ===== PANIER AMÉLIORÉ ===== */
    .cart-item {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        margin-bottom: 1rem;
        padding: 1rem;
        transition: all 0.3s ease;
    }
    .cart-item:hover {
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .cart-item-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 1rem;
    }
    .cart-item-col-info {
        flex: 2 1 200px;
    }
    .cart-item-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.25rem;
    }
    .cart-item-price {
        font-size: 0.9rem;
        color: #7f8c8d;
    }
    .cart-item-meta {
        font-size: 0.8rem;
        color: #95a5a6;
        margin-top: 0.25rem;
    }
    .cart-item-col-qty {
        flex: 1 1 140px;
    }
    .quantity-wrapper {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        background: #f8f9fa;
        border-radius: 30px;
        padding: 0.25rem;
        border: 1px solid #e9ecef;
    }
    .qty-btn {
        width: 32px;
        height: 32px;
        border: none;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: 600;
        color: #007bff;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .qty-btn:hover:not(:disabled) {
        background: #007bff;
        color: white;
    }
    .qty-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }
    .qty-input {
        width: 50px;
        text-align: center;
        border: none;
        background: transparent;
        font-weight: 600;
        color: #2c3e50;
        -moz-appearance: textfield;
    }
    .qty-input::-webkit-outer-spin-button,
    .qty-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .cart-item-col-total {
        flex: 1 1 100px;
        text-align: right;
    }
    .cart-item-subtotal {
        font-weight: 700;
        color: #2c3e50;
        font-size: 1.1rem;
    }
    .cart-item-col-action {
        flex: 0 0 40px;
        text-align: center;
    }
    .cart-item-remove {
        background: none;
        border: none;
        color: #e74c3c;
        font-size: 1.2rem;
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 50%;
        transition: all 0.2s;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .cart-item-remove:hover {
        background: #fee;
        color: #c0392b;
    }
    .cart-footer {
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 2px dashed #dee2e6;
        text-align: right;
    }
    .cart-total {
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 1rem;
    }
    .cart-total strong {
        font-size: 1.5rem;
        color: #28a745;
    }

    /* État vide */
    .cart-empty {
        text-align: center;
        padding: 3rem 1rem;
        background: #f8f9fa;
        border-radius: 20px;
    }
    .cart-empty-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    /* Responsive : sur mobile, empiler les éléments */
    @media (max-width: 576px) {
        .cart-item-row {
            flex-direction: column;
            align-items: stretch;
        }
        .cart-item-col-info,
        .cart-item-col-qty,
        .cart-item-col-total,
        .cart-item-col-action {
            flex: auto;
            text-align: left;
        }
        .cart-item-col-total {
            text-align: left;
            margin-top: 0.5rem;
        }
        .cart-item-col-action {
            text-align: right;
            margin-top: 0.5rem;
        }
        .quantity-wrapper {
            max-width: 200px;
        }
        .cart-total {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }

    </style>
@endsection
