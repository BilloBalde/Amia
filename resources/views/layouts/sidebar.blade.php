<style>
 body {
    background-color: #B0E0E6;
  }
</style>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ isActiveRoute(['home']) }}">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img"><span>Tableau de Bord</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ isActiveRoute(['produits.index', 'categories.index', 'transfers.index', 'categories.create', 'produits.create']) }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('categories.index') }}">Category List</a></li>
                        <li><a href="{{ route('produits.index') }}">Produit List</a></li>
                        <li><a href="{{ route('transfers.index') }}">Transfert Produit List</a></li>
                    </ul>
                </li>
                @if (Auth::check() && Auth::user()->role_id != 3)
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ isActiveRoute(['proformas.index', 'ligneCommandes.index']) }}"><img src="{{ asset('assets/img/icons/purchase1.svg') }}" alt="img"><span> Achat</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('proformas.index') }}">Achat List</a></li>
                        <li><a href="{{ route('ligneCommandes.index') }}">Lignes Achat List</a></li>
                    </ul>
                </li>
                @endif
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ isActiveRoute(['sales.index', 'factures.index', 'payments.index', 'facturations.add', 'journaliers.index', 'journaliers.create', 'journaliers.payments.index', 'journaliers.paymentForm', 'journaliers.paymentVoir', 'journaliers.edit', 'reports.sales', 'reports.daily']) }}"><img src="{{ asset('assets/img/icons/sales1.svg') }}" alt="img"><span> Ventes</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('sales.index') }}">Vente List</a></li>
                        <li><a href="{{ route('factures.index') }}">Facture List</a></li>
                        {{-- <li><a href="{{ route('facturations.add') }}">Facturation</a></li> --}}
                        <li><a href="{{ route('payments.index') }}">Paiement List</a></li>
                        <li><a href="{{ route('orders.index') }}">Commandes Clients</a></li>
                        <li><a href="{{ route('devis.index') }}">Devis List</a></li>
                        {{-- <li><a href="{{ route('journaliers.index') }}">Journalier</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ isActiveRoute(['expenses.index', 'expensesCategory.index']) }}"><img src="{{ asset('assets/img/icons/expense1.svg') }}" alt="img"><span>Depenses</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('expenses.index') }}">Depense List</a></li>
                        <li><a href="{{ route('expensesCategory.index') }}">Depense Category</a></li>
                    </ul>
                </li>
                @if (Auth::check() && Auth::user()->role_id != 3)
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ isActiveRoute(['customers.index', 'users.index']) }}"><img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img"><span>Personnes</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('customers.index') }}">Client List</a></li>
                        {{-- <li><a href="{{ route('customers.creditors') }}">Créanciers</a></li> --}}
                        <li><a href="{{ route('users.index') }}">Utilisateur List</a></li>
                        <li><a href="{{ route('admin.showAssignStoreForm') }}">Affecter à une boutique</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ isActiveRoute(['places.index', 'boutiques.index']) }}"><img src="{{ asset('assets/img/icons/places.svg') }}" alt="img"><span>Places</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('places.index') }}">Place list</a></li>
                        <li><a href="{{ route('boutiques.index') }}">Boutique List</a></li>
                    </ul>
                </li>
                @endif
                @if(Auth::check() && Auth::user()->role_id == 1 )
                <li class="submenu">
                    <a href="javascript:void(0);" class="{{ isActiveRoute(['paymentSetting.index', 'currencySetting.index', 'roles.index', 'baseDonnee.index', 'clear-cache']) }}"><img src="{{ asset('assets/img/icons/settings.svg') }}" alt="img"><span>Parametres</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('paymentSetting.index') }}">Paiement Parametres</a></li>
                        <li><a href="{{ route('currencySetting.index') }}">Monnaie Parametres</a></li>
                        <li><a href="{{ route('roles.index') }}">Group Permissions</a></li>
                        <li><a href="{{ route('baseDonnee.index') }}">Gestion DB</a></li>
                        <li><a href="{{ route('clear-cache') }}">Rafraichir</a></li>
                        <li><a href="#">Administration</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
