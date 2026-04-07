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
                            <h4>Gestion Produits</h4>
                            <h6>Ajout Produit</h6>
                        </div>
                    </div>
                    @include('layouts.flash')
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('produits.store') }}" method="post" id="Register" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="libelle">Libelle</label>
                                            <input type="text" id="libelle" name="libelle" class="form-control" value="{{ old('libelle') }}">
                                            @error('libelle')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="store_id">Magasin</label>
                                            <select name="store_id" id="store_id" class="form-control">
                                                <option value="">Sélectionner Magasin</option>
                                                @foreach($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->store_name ?? $store->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('store_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="sku">Identifiant Stock</label>
                                            <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku') }}">
                                            @error('sku')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="categories">Categories:</label>
                                            <select name="categories[]" multiple required class="form-control">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->slug }}</option>
                                                @endforeach
                                            </select>
                                            @error('categories')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="text" id="qtityCtn" name="qtityCtn" class="form-control" value="{{ old('qtityCtn', 1) }}" hidden>
                                       <div class="col-lg-6 col-sm-6 col-12">
                                           <div class="form-group">
                                               <label for="stock_initial">Stock initial</label>
                                               <input type="number" id="stock_initial" name="stock_initial" class="form-control" value="{{ old('stock_initial') }}">
                                               @error('stock_initial')
                                               <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                           </div>
                                       </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="price">Prix d'Achat(FG)</label>
                                            <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}">
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="price_sale">Prix de Revient(FG)</label>
                                            <input type="text" id="price_sale" name="price_sale" class="form-control" value="{{ old('price_sale') }}">
                                            @error('price_sale')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="price_sale_ctn">Prix de Vente(FG)</label>
                                            <input type="text" id="price_sale_ctn" name="price_sale_ctn" class="form-control" value="{{ old('price_sale_ctn') }}">
                                            @error('price_sale_ctn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="image"> Product Image</label>
                                            <div class="image-upload">
                                                <input type="file" name="image" value="{{ old('image') }}">
                                                <div class="image-uploads">
                                                    <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                                    <h4>Drag and drop a file to upload</h4>
                                                </div>
                                            </div>
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <x-form-actions cancel-route="{{ route('produits.index') }}"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.scripts')
    </body>
</html>
