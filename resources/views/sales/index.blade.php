<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body>
        <div id="global-loader">
            <div class="whirly-loader"> </div>
        </div>

        <div class="main-wrapper">
            @include('layouts.header')

            @include('layouts.sidebar')

            <div class="page-wrapper">
                <div class="content">
                    <div class="page-header">
                        <div class="page-title">
                            <h4>Liste des Ventes</h4>
                            <h6>Gerer vos Ventes</h6>
                        </div>
                        <div class="page-btn">
                            {{-- <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#addsale"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" class="me-2">Vendre</a> --}}
                            <a class="btn btn-added" href="{{ route('pos') }}">
                                Vendre
                            </a>
                            <!-- <a class="btn btn-added ms-2" href="{{ route('orders.index') }}">
                                Commandes Clients
                            </a> -->
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            @include('layouts.flash')
                            <div class="table-top">
                                <div class="search-set">
                                    <div class="search-path">
                                        <a class="btn btn-filter" id="filter_search">
                                            <img src="assets/img/icons/filter.svg" alt="img">
                                            <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                        </a>
                                    </div>
                                    <div class="search-input">
                                        <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}" alt="img"></a>
                                    </div>
                                </div>
                                <div class="wordset">
                                    <ul>
                                        <li>
                                            <a href="{{ route('sales.export-pdf') }}" 
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="top" 
                                            title="PDF (Toutes les ventes)"
                                            class="btn btn-sm btn-danger"
                                            style="padding: 5px 10px;">
                                                <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="pdf" style="width: 16px; height: 16px;">
                                                <span style="margin-left: 5px;">PDF</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('sales.export-excel') }}" 
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="top" 
                                            title="Excel (Toutes les ventes)"
                                            class="btn btn-sm btn-success"
                                            style="padding: 5px 10px;">
                                                <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="excel" style="width: 16px; height: 16px;">
                                                <span style="margin-left: 5px;">Excel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card" id="filter_inputs">
                                <div class="card-body pb-0">
                                    <form action="{{ route('sales.index') }}" method="GET"> <!-- Update to GET method -->
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" name="numeroFacture" value="{{ request('numeroFacture') }}" placeholder="numeroFacture" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select name="product_id" id="product_id" class="form-control">
                                                        <option value="">Selectionner Produit</option>
                                                        @foreach ($produits as $item)
                                                        <option value="{{ $item->id }}" {{ request('product_id') == $item->id ? 'selected' : '' }}>{{ $item->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="date" name="created_at" value="{{ request('created_at') }}" placeholder="date creation" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12 d-flex align-items-center">
                                                <div class="form-group d-flex">
                                                    <button type="submit" class="btn btn-filters me-2"><img src="assets/img/icons/search-whites.svg" alt="img"></button>
                                                    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Remettre à jour</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table  datanew">
                                    <thead>
                                        <tr>
                                            <th>No. Facture</th>
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                            <th>Prix Total</th>
                                            <th>Interet</th>
                                            <th>Created at</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataTable as $data)
                                        <tr>
                                            <td>{{ $data->numeroFacture }}</td>
                                            <td class="productimgname">
                                                <a href="javascript:void(0);" class="product-img" onclick="showProductDetails({{ $data->product_id }})">
                                                    <img src="{{ asset('products/' . $data->produitImage) }}" alt="product">
                                                </a>
                                                <a href="javascript:void(0);" onclick="showProductDetails({{ $data->product_id }})">{{ $data->produit }}</a>
                                            </td>
                                            <td>{{ $data->quantity }}</td>
                                            <td>{{ $data->prix }}</td>
                                            <td>{{ $data->prixTotal }}</td>
                                            <td>{{ $data->interet }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td class="text-end">
                                            @if (App\Models\Facture::where('numero_facture', $data->numeroFacture)->first()?->statut == 'non payé')
                                                <a class="me-3" href="{{ route('sales.edit', $data->id) }}">
                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                </a>
                                                @else
                                                No action
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Détails du Produit -->
        <div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productDetailsModalLabel">Détails du Produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="productDetailsContent">
                        <div class="text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        @include('factures.add')

        @include('layouts.scripts')
        <script>
        function showProductDetails(productId) {
            // Afficher le modal
            const modal = new bootstrap.Modal(document.getElementById('productDetailsModal'));
            modal.show();
            
            // Obtenir le token CSRF s'il existe
            const metaToken = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = metaToken ? metaToken.getAttribute('content') : '';
            
            // Préparer les headers
            const headers = {
                'Accept': 'application/json'
            };
            
            // Ajouter le token seulement s'il existe
            if (csrfToken) {
                headers['X-CSRF-TOKEN'] = csrfToken;
            }
            
            // Charger les détails du produit via AJAX
            fetch(`/products/${productId}`, {
                method: 'GET',
                headers: headers
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayProductDetails(data.product);
                } else {
                    document.getElementById('productDetailsContent').innerHTML = '<p class="text-danger">Erreur lors du chargement des détails du produit.</p>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('productDetailsContent').innerHTML = '<p class="text-danger">Une erreur est survenue.</p>';
            });
        }

        function displayProductDetails(product) {
            const content = `
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="/products/${product.image}" alt="${product.libelle}" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 40%">Nom du produit</th>
                                <td>${product.libelle}</td>
                            </tr>
                            <tr>
                                <th>SKU</th>
                                <td>${product.sku || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Catégorie</th>
                                <td>${product.category_name || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>${product.description || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Prix d'achat</th>
                                <td>${product.price ? new Intl.NumberFormat('fr-FR').format(product.price) + ' F' : 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Prix de revient</th>
                                <td>${product.price_sale ? new Intl.NumberFormat('fr-FR').format(product.price_sale) + ' F' : 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Prix de vente</th>
                                <td>${product.price_sale_ctn ? new Intl.NumberFormat('fr-FR').format(product.price_sale_ctn) + ' F' : 'N/A'}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            `;
            
            document.getElementById('productDetailsContent').innerHTML = content;
        }
        </script>
    </body>
</html>
