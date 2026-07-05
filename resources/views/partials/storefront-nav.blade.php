@php
    $navLinkClass = fn($active) => $active
        ? 'text-amber-600 font-semibold border-b-2 border-amber-500 pb-1'
        : 'text-gray-700 font-medium hover:text-amber-600 transition';
@endphp
<nav class="fixed top-0 w-full z-50 bg-white/95 shadow-sm" style="backdrop-filter: blur(10px);">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('accueil') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/customers/logo.jpg') }}" alt="SMH" class="h-10 w-auto object-contain">
                <span class="text-xl font-bold text-gray-800 hidden sm:inline">SMH</span>
            </a>
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('accueil') }}" class="{{ $navLinkClass(request()->routeIs('accueil')) }}">Accueil</a>
                <a href="{{ route('products.index') }}" class="{{ $navLinkClass(request()->routeIs('products.index')) }}">Catalogue</a>
                <a href="{{ route('public.categories') }}" class="{{ $navLinkClass(request()->routeIs('public.categories')) }}">Catégories</a>
                <a href="{{ route('about') }}" class="{{ $navLinkClass(request()->routeIs('about')) }}">À propos</a>
                <a href="{{ route('contact') }}" class="{{ $navLinkClass(request()->routeIs('contact')) }}">Contact</a>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    @if(Auth::user()->isCustomer())
                        <a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-amber-600 transition text-sm" title="Mes commandes">
                            <i class="fas fa-receipt text-xl"></i>
                        </a>
                        <a href="{{ route('addresses.index') }}" class="text-gray-700 hover:text-amber-600 transition text-sm hidden sm:inline" title="Mes adresses">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </a>
                        <form method="POST" action="{{ route('shop.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-amber-600 transition text-sm" title="Déconnexion">
                                <i class="fas fa-sign-out-alt text-xl"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-amber-600 transition text-sm" title="Espace gestion">
                            <i class="fas fa-tachometer-alt text-xl"></i>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-amber-600 transition text-sm" title="Déconnexion">
                                <i class="fas fa-sign-out-alt text-xl"></i>
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('otp.login') }}" class="text-gray-700 hover:text-amber-600 transition font-medium text-sm">
                        <i class="fas fa-sign-in-alt text-xl"></i>
                        <span class="hidden sm:inline ml-1">Client</span>
                    </a>
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-amber-600 transition text-sm" title="Espace gestion">
                        <i class="fas fa-user-shield text-xl"></i>
                        <span class="hidden sm:inline ml-1">Admin</span>
                    </a>
                @endauth
                <a href="{{ route('panier') }}" class="relative p-2 text-gray-700 hover:text-amber-600 transition">
                    <i class="fas fa-shopping-bag text-xl"></i>
                    <span id="cart-count" class="absolute top-0 right-0 bg-amber-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                        {{ count(session('cart', [])) }}
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>
