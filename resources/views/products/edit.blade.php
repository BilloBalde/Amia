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
                            <h4>Modification Produit</h4>
                            <h6>Modifier le Produit</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('produits.update', $product->id) }}" method="POST" id="Register" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{ $product->id }}">

                                <div class="row">
                                    <!-- Product Name -->
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="libelle">Libelle</label>
                                            <input type="text" id="libelle" name="libelle" class="form-control" value="{{ old('libelle', $product->libelle) }}" required>
                                            @error('libelle')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Stock Identifier -->
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="sku">Identifiant Stock</label>
                                            <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}" required>
                                            @error('sku')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Stock Quantity -->
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="card-body">
                                            @if ($userStoreId)
                                                {{-- Locked to a single store --}}
                                                <div class="mb-2">
                                                    <strong>Magasin :</strong>
                                                    {{ \App\Models\Store::find($userStoreId)?->store_name ?? 'N/A' }}
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Stock dans ce magasin :</strong>
                                                    <span id="stockForStore">{{ $quantityForUser }}</span>
                                                </div>
                                                <div class="text-muted">
                                                    <strong>Stock total (tous magasins) :</strong>
                                                    <span>{{ $totalQty }}</span>
                                                </div>
                                                <input type="hidden" id="store_id" value="{{ $userStoreId }}">
                                            @else
                                                {{-- Multi-store: let user pick a store and show its stock --}}
                                                <div class="row g-3 align-items-end">
                                                    <div class="col-md-6">
                                                        <label for="store_id" class="form-label">Magasin</label>
                                                        <select id="store_id" name="store_id" class="form-control">
                                                            <option value="">-- Sélectionner magasin --</option>
                                                            @foreach ($stores as $s)
                                                                <option value="{{ $s->id }}">{{ $s->store_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('store_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div>
                                                            <strong>Stock dans ce magasin :</strong>
                                                            <span id="stockForStore">0</span>
                                                        </div>
                                                        <div class="text-muted">
                                                            <strong>Stock total (tous magasins) :</strong>
                                                            <span>{{ $totalQty }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Categories (Multiple Select) -->
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="categories">Categories:</label>
                                            <select name="categories[]" id="categories" multiple class="form-control" required>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $category->slug }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('categories')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Stock Global (modifiable) -->
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label for="stock_restant">Stock global</label>
                                            <input type="number" id="stock_restant" name="stock_restant" class="form-control" value="{{ old('stock_restant', $totalQty) }}">
                                            @error('stock_restant')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="text" id="qtityCtn" name="qtityCtn" class="form-control" value="{{ old('qtityCtn', $product->qtityCtn) }}" hidden>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="price">Prix d'Achat(FG)</label>
                                            <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="price_sale">Prix de Revient(FG)</label>
                                            <input type="text" id="price_sale" name="price_sale" class="form-control" value="{{ old('price_sale', $product->price_sale ?? 0) }}">
                                            @error('price_sale')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="price_sale_ctn">Prix de Vente(FG)</label>
                                            <input type="text" id="price_sale_ctn" name="price_sale_ctn" class="form-control" value="{{ old('price_sale_ctn', $product->price_sale_ctn ?? 0) }}">
                                            @error('price_sale_ctn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Product Image Upload -->
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="image">Product Image</label>
                                            <div class="image-upload">
                                                @if ($product->image)
                                                    <img src="{{ asset('products/' . $product->image) }}" alt="product image" style="width: 150px; height: auto; border: 1px solid #ccc; margin-bottom: 10px;">
                                                @else
                                                    <p>Aucune Image associated</p>
                                                @endif

                                                <!-- File Input -->
                                                <input type="file" name="image" id="image" class="form-control">
                                                <small class="form-text text-muted">Mettre a jour l'image of product.</small>
                                            </div>
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit and Cancel Buttons -->
                                    <div class="col-lg-12">
                                        <x-form-actions mode="edit" cancel-route="{{ route('produits.index') }}"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Preloaded per-store quantities from controller
                const perStore = @json($perStoreQuantities);
                const storeSelect = document.getElementById('store_id');
                const out = document.getElementById('stockForStore');

                function updateQty() {
                    const id = storeSelect?.value || storeSelect?.getAttribute('value');
                    const qty = (id && perStore[id]) ? perStore[id] : 0;
                    if (out) out.textContent = qty;
                }

                if (storeSelect) {
                    // initialize if a value is already set
                    updateQty();
                    storeSelect.addEventListener('change', updateQty);
                }
            });
        </script>
    </body>
</html>
