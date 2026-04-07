<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.check');
    }

    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::query();

        if ($request->filled('libelle')) {
            $query->where('libelle', 'like', '%' . $request->input('libelle') . '%');
        }

        if ($request->filled('category_id')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->input('category_id'));
            });
        }

        $connectedUser = Auth::user()->role_id;

        if ($connectedUser == 3) {
            $userStoreId = Store::where('user_id', Auth::user()->id)->value('id');
            $query->whereHas('stores', function ($q) use ($userStoreId) {
                $q->where('store_id', $userStoreId);
            });
        }
        $allProducts = $query->with(['categories', 'stores'])->get();

        $userStoreId = $connectedUser == 3
            ? Store::where('user_id', Auth::user()->id)->value('id')
            : null;

        return view('products.index', compact('allProducts', 'categories', 'userStoreId'))
            ->with('libelle', $request->input('libelle'))
            ->with('category_id', $request->input('category_id'));
    }

    public function fetchProductDetails(Request $request)
    {
        $productName = $request->query('productName');
        $product = Product::with('category')->where('libelle', 'like', '%' . $productName . '%')->first();

        if ($product) {
            return response()->json([
                'success' => true,
                'product' => [
                    'id' => $product->id,
                    'libelle' => $product->libelle,
                    'qtityCtn' => $product->qtityCtn,
                    'image' => $product->image,
                    'category' => [
                        'id' => $product->category?->id,
                        'name' => $product->category?->slug
                    ]
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found'
        ]);
    }
    
    public function fetchProductDetailsSuggestion(Request $request)
    {
        $productName = $request->query('productName');

        if ($request->boolean('suggestions')) {
            $suggestions = Product::where('libelle', 'like', '%' . $productName . '%')
                ->limit(10)
                ->get(['id', 'libelle']);

            return response()->json([
                'success' => true,
                'suggestions' => $suggestions
            ]);
        }

        $product = Product::where('libelle', $productName)->first();

        if ($product) {
            return response()->json([
                'success' => true,
                'product' => $product
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found'
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $stores = Store::all();
        return view('products.create', compact('categories', 'stores'));
    }

    public function validation(Request $request)
    {
        return $request->validate([
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'libelle' => 'required|string|max:225',
            'sku' => 'required|string|max:225',
            'description' => 'required|string',
            'qtityCtn' => 'required|numeric',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'stock_initial' => 'required|integer|min:0',
            'store_id' => 'required|exists:stores,id',
            'image' => 'image'
        ], [
            'categories.required' => 'veuillez selectionner la categorie',
            'categories.array' => 'Selectionner plusieurs categories',
            'libelle.required' => 'champ libelle doit être rempli',
            'libelle.string' => 'champ libelle prend au maximum 225 caractères',
            'sku.required' => 'champ sku doit être rempli',
            'sku.string' => 'champ sku prend au maximum 225 caractères',
            'description.required' => 'champ description doit être rempli avec une chaine de caractere',
            'qtityCtn.required' => 'champ Quantity par carton doit être rempli avec une valeure numérique',
            'price.required' => 'champ Prix doit être rempli avec une valeure numérique',
            'price_sale.numeric' => 'champ Prix Vente doit être rempli avec une valeure numérique',
            'stock_initial.required' => 'champ Stock initial doit être rempli',
            'stock_initial.integer' => 'champ Stock initial doit être un nombre entier',
            'stock_initial.min' => 'champ Stock initial doit être positif',
            'store_id.required' => 'champ Magasin doit être rempli',
            'store_id.exists' => 'Magasin sélectionné invalide',
            'image.image' => 'champ image ne prend que des images',
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);
        if (request()->hasfile('image')) {
            $productName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('products'), $productName);
        }
        try {
            $product = Product::create([
                'libelle' => $request->libelle,
                'sku' => $request->sku,
                'description' => $request->description,
                'qtityCtn' => $request->qtityCtn,
                'price' => $request->price,
                'price_sale' => $request->price_sale ?? NULL,
                'price_sale_ctn' => $request->price_sale_ctn ?? NULL,
                'image' => $productName ?? NULL,
                'stock_initial' => $request->stock_initial,
                'stock_restant' => $request->stock_initial, // Initialisé à la création
            ]);

            $product->categories()->attach($request->categories);

            // Ajout du stock dans le magasin sélectionné
            $storeId = $request->store_id;
            $product->stores()->attach($storeId, ['quantity' => $request->stock_initial]);

            return redirect()->route('produits.index')->with('success', 'Produit crée avec succès.');
        } catch (\Exception $e) {
            return back()->with('fall', 'une erreur lors de lajout, voici le message : ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'product' => [
                'id' => $product->id,
                'libelle' => $product->libelle,
                'sku' => $product->sku,
                'description' => $product->description,
                'price' => $product->price,
                'price_sale' => $product->price_sale,
                'price_sale_ctn' => $product->price_sale_ctn,
                'image' => $product->image,
                'category_name' => $product->categories->pluck('slug')->implode(', ')
            ]
        ]);
    }

    public function edit($id)
    {
        $product = Product::with(['categories', 'stores', 'latestLigneCommande'])->findOrFail($id);
        // ✅ SUPPRIMÉ: Category::where('tenant_id', Auth::user()->tenant_id)
        $categories = Category::all();
        $stores = Store::select('id', 'store_name')->get();

        $user = Auth::user();
        $userStoreId = ($user && $user->role_id == 3)
            ? Store::where('user_id', $user->id)->value('id')
            : null;

        $perStoreQuantities = $product->stores
            ->mapWithKeys(fn ($s) => [$s->id => (int) ($s->pivot->quantity ?? 0)])
            ->toArray();

        $totalQty = array_sum($perStoreQuantities);

        $quantityForUser = $userStoreId
            ? (int) ($perStoreQuantities[$userStoreId] ?? 0)
            : 0;

        return view('products.edit', compact(
            'product',
            'categories',
            'stores',
            'userStoreId',
            'perStoreQuantities',
            'totalQty',
            'quantityForUser'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle'      => 'required|string|max:255',
            'sku'          => 'required|string|max:255|unique:products,sku,' . $id,
            'categories'   => 'required|array',
            'categories.*' => 'exists:categories,id',
            'description'  => 'required|string',
            'qtityCtn'     => 'required|numeric',
            'price'        => 'required|numeric',
            'stock_restant' => 'required|integer|min:0',
            'price_sale'   => 'nullable|numeric',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'store_id' => 'required|exists:stores,id',
        ]);

        try {
            // ✅ SUPPRIMÉ: withoutGlobalScope('tenant') - plus besoin
            $product = Product::findOrFail($id);
            $storeId = $request->input('store_id');

            $product->fill($request->except('categories', 'image'));

            $product->save();

            if ($request->hasFile('image')) {
                $productName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('products'), $productName);
                $product->update(['image' => $productName]);
            }

            // ✅ SUPPRIMÉ: tenant_id dans sync
            $product->categories()->sync($request->categories);

            $storeProduct = StoreProduct::where('product_id', $id)->where('store_id', $storeId)->first();

            $storeProduct->quantity = $request->input('stock_restant');
            $storeProduct->save();

            return redirect()
                ->route('produits.index')
                ->with('success', 'Produit mis à jour avec succès!');

        } catch (\Exception $e) {
            return back()->with('fall', 'Erreur: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Product::find($id)->delete();
            return redirect()->back()->with('success', 'Produit supprimé avec succès.');
        } catch (\Illuminate\Database\QueryException $th) {
            if ($th->getCode() == "23000") {
                return back()->with(
                    'error',
                    "Impossible de supprimer ce produit : il est déjà utilisé dans d'autres enregistrements."
                );
            }
            return redirect()->back()->with('error', 'Produit pas supprimé. Voici l\'erreur' . $th->getMessage());
        }
    }
}
