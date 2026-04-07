<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use App\Http\Controllers\Authentification;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencySettingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentSettingController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreProductController;
use App\Http\Controllers\BaseDonneeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProformaController;
use App\Http\Controllers\LigneCommandeController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\CatalogueAuthController;
use App\Http\Controllers\CatalogueOrdersController;

use App\Http\Controllers\FactureController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalierController;
use App\Http\Controllers\MovementController;

use App\Exports\ProductsExport;
use App\Exports\PurchasesExport;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/ping', function() {
    return 'pong';
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/payments/export-pdf', [PaymentController::class, 'exportPdf'])->name('payments.export');
Route::get('/payments/export-excel', [PaymentController::class, 'exportExcel'])->name('payments.exportExcel');

Route::get('/test-route', function() {
    return "Route de test fonctionne";
});
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])
    ->middleware('throttle:5,1')
    ->name('password.email');
Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::get('password/reset/{token}/{email}', [ForgotPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/misajour', [ForgotPasswordController::class, 'reset'])
    ->middleware('throttle:5,1')
    ->name('password.update');

Route::get('/', function () {
    return redirect()->route('login');
})->name('accueil');

Route::get('/catalogue', [CustomerOrderController::class, 'create'])->name('storefront');
Route::post('/catalogue', [CustomerOrderController::class, 'store'])->name('storefront.store');
Route::get('/catalogue/login', [CatalogueAuthController::class, 'showLogin'])->name('catalogue.login');
Route::post('/catalogue/login', [CatalogueAuthController::class, 'login'])->middleware('throttle:10,1')->name('catalogue.login.submit');
Route::get('/catalogue/register', [CatalogueAuthController::class, 'showRegister'])->name('catalogue.register');
Route::post('/catalogue/register', [CatalogueAuthController::class, 'register'])->middleware('throttle:5,1')->name('catalogue.register.submit');
Route::post('/catalogue/logout', [CatalogueAuthController::class, 'logout'])->name('catalogue.logout');
Route::get('/catalogue/mes-commandes', [CatalogueOrdersController::class, 'index'])->name('catalogue.orders');

Route::get('/home', [IndexController::class, 'index'])->middleware('auth.check')->name('home');

Route::get('/about', function () {
    return view('visitor.about', ['pageName' => 'about-page']);
})->name('about');

Route::get('/product', function () {
    return view('visitor.productDetail', ['pageName' => 'project-details-page']);
})->name('productDetail');

Route::get('/contact', function () {
    return view('visitor.contact', ['pageName' => 'contact-page']);
})->name('contact');

// Avoid GET logout (CSRFable). Use POST with CSRF token.
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('accueil')->with('success', 'User logged out');
})->middleware('auth.check')->name('logout');
Route::get('/logout', function () {
    return redirect()->route('login');
});

Route::get('/mouvements', [MovementController::class, 'index'])
    ->name('movements.index');
Route::get('/mouvements/pdf', [MovementController::class, 'exportPdf'])
    ->name('movements.pdf');

Route::get('/login', [Authentification::class, 'login'])->name('login');
Route::get('/register', [Authentification::class, 'register'])->name('addUser');
Route::put('/updateUser/{id}', [Authentification::class, 'update'])->name('updateUser');
Route::get('/edit/{user}', [Authentification::class, 'edit'])->name('editUser');
Route::get('/forgotPass', [Authentification::class, 'forgotPass'])->name('forgotPass');
Route::get('/registration/verification/{token}/{email}', [Authentification::class, 'registration_verify'])->name('verification');
Route::post('/register', [Authentification::class, 'create'])->name('enregistrer');
Route::post('/login_submit', [Authentification::class, 'login_submit'])
    ->middleware('throttle:10,1')
    ->name('login_submit');
// Keep legacy endpoint but make it safe (sends reset link, doesn't reveal existence)
Route::post('/passwordRecovery', [Authentification::class, 'passwordRecovery'])
    ->middleware('throttle:5,1')
    ->name('passwordRecovery');
Route::post('/sendEmail', [Authentification::class, 'sendEmail'])->name('sendEmail');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/emailSetting', [EmailController::class, 'index'])->name('emailSetting');
Route::post('/profileImage', [ProfileController::class, 'profileImage'])->name('profileImage');
Route::post('/profileInfo', [ProfileController::class, 'profileInfo'])->name('profileInfo');
Route::post('/password', [ProfileController::class, 'passwordupdate'])->name('passwordupdate');
Route::resource('users', UserController::class);
// Routes pour affecter un utilisateur à une boutique
Route::get('/admin/assign-store', [UserController::class, 'showAssignStoreForm'])->middleware('auth.check')->name('admin.showAssignStoreForm');
Route::post('/admin/assign-store', [UserController::class, 'assignStore'])->middleware('auth.check')->name('admin.assignStore');
Route::resource('paymentSetting', PaymentSettingController::class);
Route::resource('currencySetting', CurrencySettingController::class);
Route::resource('roles', RoleController::class);
Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
Route::get('/places/{place}', [PlaceController::class, 'edit'])->name('places.edit');
Route::get('/createplace', [PlaceController::class, 'create'])->name('places.create');
Route::post('/createplace', [PlaceController::class, 'store'])->name('places.store');
Route::delete('/places/{id}', [PlaceController::class, 'destroy'])->name('places.destroy');
Route::put('/updateplace/{place}', [PlaceController::class, 'update'])->name('places.update');
// (duplicate removed) roles resource is declared earlier
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/creditors', [CustomerController::class, 'creditors'])->name('customers.creditors');
Route::get('/createcustomer', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/createcustomer', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
// Web routes
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::post('/customers/{id}/restore', [CustomerController::class, 'restore'])->name('customers.restore');
Route::delete('/customers/{id}/force', [CustomerController::class, 'forceDelete'])->name('customers.forceDelete');
Route::get('/customers/trashed', [CustomerController::class, 'trashed'])->name('customers.trashed');
Route::resource('boutiques', StoreController::class);
Route::resource('expensesCategory', ExpenseCategoryController::class);
Route::resource('expenses', ExpenseController::class);

Route::resource('categories', CategoryController::class);
Route::resource('produits', ProductController::class);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/fetch-product-details', [ProductController::class, 'fetchProductDetails'])->middleware('auth.check');
Route::get('/fetch-product-details-suggestion', [ProductController::class, 'fetchProductDetailsSuggestion'])->middleware('auth.check');
Route::resource('logistics', LogisticController::class);
Route::resource('purchases', PurchaseController::class);
Route::get('/purchases/ajout/{numeroPurchase}/{quantity}/{store}', [PurchaseController::class, 'ajout'])->name('purchases.ajout');
Route::resource('factures', FactureController::class);
Route::get('/factures/bon-de-commande/{facture}', [FactureController::class, 'bonDeCommande'])->name('factures.bon-de-commande');
Route::get('/factures/bon-de-sortie/{facture}', [FactureController::class, 'bonDeSortie'])->name('factures.bon-de-sortie');
Route::resource('sales', SaleController::class);
Route::get('/ventes/export-excel', [SaleController::class, 'exportExcel'])->name('sales.export-excel');
Route::get('/ventes/export-pdf', [SaleController::class, 'exportPDF'])->name('sales.export-pdf');
Route::get('/ventes/export-current-excel', [SaleController::class, 'exportCurrentExcel'])->name('sales.export-current-excel');
Route::get('/ventes/export-current-pdf', [SaleController::class, 'exportCurrentPDF'])->name('sales.export-current-pdf');
Route::get('/sales/ajout/{numero_facture}/{avance}/{store_id}', [SaleController::class, 'ajout'])->name('sales.ajout');
Route::get('/reports/sales', [SalesReportController::class, 'index'])->name('reports.sales');
Route::get('/reports/daily', [DailyReportController::class, 'index'])->name('reports.daily');
Route::get('/reports/daily/export/pdf', [DailyReportController::class, 'exportPDF'])->name('reports.daily.export.pdf');
Route::resource('payments', PaymentController::class);
Route::get('/facture/payment/{id}', [PaymentController::class, 'creation'])->name('payments.creation');
Route::get('/facture/voirPayment/{id}', [PaymentController::class, 'voir'])->name('payments.voir');
Route::get('/receipts/payments/{payment}', [ReceiptController::class, 'payment'])->name('receipts.payments.show');
Route::get('/paiementsClient/add/{mark}', [PaymentController::class, 'add'])->name('paiementsClient.add');
Route::post('/paiementsClient/store', [PaymentController::class, 'storePayment'])->name('paiementsClient.store');
Route::get('/receipts/transactions/{transaction}', [ReceiptController::class, 'transaction'])->name('receipts.transactions.show');
Route::get('/receipts/transfers/{transfer}', [ReceiptController::class, 'transfer'])->name('receipts.transfers.show');
Route::get('/updateCustomerTotals', [PaymentController::class, 'updateCustomerTotals'])->middleware('auth.check');
Route::post('/customers/quick-add', [CustomerController::class, 'quickAdd'])->name('customers.quick-add');

use Maatwebsite\Excel\Facades\Excel;

// Routes d'export SANS middleware (accessibles à tous)
Route::get('/produits/export-excel', function () {
    try {
        return Excel::download(new ProductsExport, 'products.xlsx');
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
})->name('produits.export-excel');

Route::get('/produits/export-pdf', function () {
    // Augmenter la mémoire et le temps d'exécution
    ini_set('memory_limit', '512M');
    ini_set('max_execution_time', 300); // 5 minutes
    
    try {
        $dataTable = App\Models\Product::with('categories', 'stores')->get();
        $userStoreId = auth()->user()->role_id == 3
                ? App\Models\Store::where('user_id', auth()->user()->id)->value('id')
                : null;
        
        $pdf = Pdf::loadView('products.export', compact('dataTable', 'userStoreId'));
        $pdf->setPaper('A4', 'landscape');
        $pdf->setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'chroot' => public_path(),
        ]);
        
        return $pdf->download('products_' . date('Y-m-d') . '.pdf');
    } catch (\Exception $e) {
        return back()->with('error', 'Erreur: ' . $e->getMessage());
    }
})->name('produits.export-pdf');

Route::get('/produits/export-excel-queue', function() {
    dispatch(new \App\Jobs\ExportProductsJob(auth()->id(), auth()->user()->role_id));
    return back()->with('success', 'Export en cours. Vous serez notifié quand il sera prêt.');
})->name('produits.export-excel-queue');

Route::get('/debug-export-crash', function() {
    // 1. Écrire dans un fichier pour voir si on arrive jusqu'ici
    $logFile = public_path('debug_crash.txt');
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Route appelée\n", FILE_APPEND);
    
    // 2. Afficher quelque chose à l'écran
    echo "Début du debug...<br>";
    flush();
    ob_flush();
    
    // 3. Vérifier la mémoire
    echo "Mémoire actuelle: " . memory_get_usage() / 1024 / 1024 . " MB<br>";
    echo "Limite mémoire: " . ini_get('memory_limit') . "<br>";
    echo "Temps max: " . ini_get('max_execution_time') . " secondes<br>";
    
    // 4. Compter les produits
    $count = App\Models\Product::count();
    echo "Nombre de produits: $count<br>";
    
    // 5. Essayer de charger les produits
    try {
        $products = App\Models\Product::with('categories', 'stores')->get();
        echo "Produits chargés: " . $products->count() . "<br>";
        echo "Mémoire après chargement: " . memory_get_usage() / 1024 / 1024 . " MB<br>";
    } catch (\Exception $e) {
        echo "Erreur: " . $e->getMessage();
        file_put_contents($logFile, date('Y-m-d H:i:s') . " - ERREUR: " . $e->getMessage() . "\n", FILE_APPEND);
    }
    
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Fin du debug\n", FILE_APPEND);
    
    return "Debug terminé, vérifiez le fichier " . $logFile;
});

Route::get('/produits/export-csv', function () {
    $filename = 'products_' . date('Y-m-d') . '.csv';
    
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
    ];
    
    $callback = function() {
        $handle = fopen('php://output', 'w');
        
        // En-têtes CSV
        fputcsv($handle, ['Nom', 'SKU', 'Catégories', 'Stock', 'Prix']);
        
        // Traiter par lots de 100 pour économiser la mémoire
        App\Models\Product::with('categories', 'stores')
            ->chunk(100, function($products) use ($handle) {
                foreach ($products as $product) {
                    // Calculer le stock selon le rôle
                    if (auth()->user()->role_id == 3) {
                        $storeId = App\Models\Store::where('user_id', auth()->id())->value('id');
                        $store = $product->stores->firstWhere('id', $storeId);
                        $stock = $store ? $store->pivot->quantity : 0;
                    } else {
                        $stock = $product->stores->sum('pivot.quantity');
                    }
                    
                    $categories = $product->categories->pluck('slug')->implode('|');
                    
                    fputcsv($handle, [
                        $product->libelle,
                        $product->sku,
                        $categories,
                        $stock,
                        $product->price_sale_ctn ?? 0
                    ]);
                }
            });
        
        fclose($handle);
    };
    
    return response()->stream($callback, 200, $headers);
})->name('produits.export-csv');

Route::get('/produits/download-export', function() {
    $file = session('export_file');
    if ($file && Storage::exists(str_replace('/storage', 'public', $file))) {
        return response()->download(storage_path('app/public/' . str_replace('/storage/', '', $file)));
    }
    return back()->with('error', 'Fichier non trouvé');
})->name('produits.download-export');

Route::get('/purchases/export-excel', function () {
    return Excel::download(new PurchasesExport, 'purchases.xlsx');
})->middleware('auth.check')->name('purchases.export-excel');

Route::get('/purchases/export-pdf', function () {
    $dataTable = App\Models\Purchase::all();
    $pdf = Pdf::loadView('purchases.export', compact('dataTable'));
    return $pdf->download('purchases.pdf');
})->middleware('auth.check')->name('purchases.export-pdf');

// In routes/web.php, inside your authenticated routes group
Route::resource('devis', App\Http\Controllers\DeviController::class);
Route::post('/devis/{id}/status', [App\Http\Controllers\DeviController::class, 'changeStatus'])->name('devis.status');
Route::post('/devis/{id}/validate', [App\Http\Controllers\DeviController::class, 'validateDevis'])->name('devis.validate');
Route::get('/devis/{id}/pdf', [App\Http\Controllers\DeviController::class, 'showPdf'])->name('devis.pdf');
Route::get('/devis/{id}/pdf-download', [App\Http\Controllers\DeviController::class, 'downloadPdf'])->name('devis.pdf-download');

Route::get('/logistics/export-excel', [LogisticController::class, 'exportExcel'])->middleware('auth.check')->name('logistics.export-excel');
Route::get('/logistics/export-pdf', [LogisticController::class, 'exportPDF'])->middleware('auth.check')->name('logistics.export-pdf');

Route::post('/customers/search', [CustomerController::class, 'search'])->name('customers.search');

Route::post('/purchases/exitAchat/{numeroPurchase}', [PurchaseController::class, 'exitAchat'])->name('exitPurchase');
Route::post('/sales/exitSale/{numero_facture}', [SaleController::class, 'exitSale'])->name('exitSale');

Route::resource('transfers', StoreProductController::class);
Route::get('/baseDonnee', [BaseDonneeController::class, 'index'])->name('baseDonnee.index');
Route::post('/baseDonnee/{id}/delete', [BaseDonneeController::class, 'delete'])->name('deleteLines');

Route::get('/clear-cache', function() {
    if (!auth()->check() || auth()->user()->role_id != 1) {
        abort(403);
    }
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    return view('refreshed');
})->middleware('auth.check')->name('clear-cache');


Route::post('/compagnie', [ProfileController::class, 'companyCreate'])->name('companyCreate');
Route::get('pos', [SaleController::class, 'pos'])->middleware('auth.check')->name('pos');
Route::post('pos/storeCustomer', [SaleController::class,'storeCustomer'])->middleware('auth.check')->name('pos.storeCustomer');
Route::get('/sales/voir/{numero_facture}', [SaleController::class, 'voirSales'])->middleware('auth.check')->name('voirSales');

Route::resource('proformas', ProformaController::class);
Route::get('/proformas/invoice/{id}', [ProformaController::class, 'addInvoice'])->name('proformas.addInvoice');
Route::get('/proformas/editInvoice/{id}', [ProformaController::class, 'editInvoice'])->name('proformas.editInvoice');
Route::resource('ligneCommandes', LigneCommandeController::class);
Route::post('/proformas', [LigneCommandeController::class, 'store'])->name('commandes.store');
Route::post('/proformas/updating/{id}', [LigneCommandeController::class, 'updateInvoice'])->name('commandes.updateInvoice');
Route::post('/proformas/rajout/{id}', [LigneCommandeController::class, 'addInvoice'])->name('commandes.addInvoice');
Route::post('/proformas/customerAdd', [ProformaController::class, 'storeCustomer'])->name('proformas.storeCustomer');
Route::post('/commandes/confirmer/proforma', [LigneCommandeController::class, 'confirmation'])->name('ligneCommandes.confirmer');
Route::get('/lesCommandes/add', [LigneCommandeController::class, 'addLines'])->name('ligneCommandes.addLines');
Route::post('/proformas/add', [ProformaController::class, 'creation'])->name('proformas.creation');
Route::get('/orders', [CustomerOrderController::class, 'index'])->middleware('auth.check')->name('orders.index');
Route::get('/orders/{order}', [CustomerOrderController::class, 'show'])->middleware('auth.check')->name('orders.show');
Route::put('/orders/{order}/status', [CustomerOrderController::class, 'updateStatus'])->middleware('auth.check')->name('orders.status');
Route::get('/facturations/add', [FactureController::class, 'facturationForm'])->name('facturations.add');
Route::post('/facturations/store', [FactureController::class, 'facturationStore'])->name('facturations.store');
Route::post('/facturations/storeCustomer', [FactureController::class, 'storeCustomer'])->name('facturations.storeCustomer');
Route::delete('/facturations/{facture}', [FactureController::class, 'destroy'])->name('facturations.destroy');



Route::get('/journalier', [JournalierController::class, 'index'])->name('journaliers.index');
Route::get('/journalier/create', [JournalierController::class, 'create'])->name('journaliers.create');
Route::post('/journalier', [JournalierController::class, 'store'])->name('journaliers.store');
Route::get('/journalier/{id}', [JournalierController::class, 'edit'])->name('journaliers.edit');
Route::put('/journalier/{id}', [JournalierController::class, 'update'])->name('journaliers.update');
Route::delete('/journalier/{id}', [JournalierController::class, 'destroy'])->name('journaliers.delete');
Route::get('/journaliers/paiements', [JournalierController::class, 'paymentsIndex'])->name('journaliers.payments.index');
Route::get('/journalier/paiementList/{id}', [JournalierController::class, 'list'])->name('journaliers.paymentVoir');
Route::get('/journalier/paiementForm/{id}', [JournalierController::class, 'payForm'])->name('journaliers.paymentForm');
Route::post('/journalier/paiement', [JournalierController::class, 'paySubmit'])->name('journalier.pay');

Route::get('/debug-exports', function() {
    $results = [];
    
    // Test 1: Vérifier si la route existe
    $results['route_exists'] = 'OK';
    
    // Test 2: Vérifier si l'utilisateur est connecté
    $results['user_authenticated'] = auth()->check() ? 'Oui' : 'Non';
    if (auth()->check()) {
        $results['user_id'] = auth()->id();
        $results['user_role'] = auth()->user()->role_id;
    }
    
    // Test 3: Vérifier les packages
    $results['excel_installed'] = class_exists('Maatwebsite\Excel\Excel') ? 'Oui' : 'Non';
    $results['dompdf_installed'] = class_exists('Barryvdh\DomPDF\Facade\Pdf') ? 'Oui' : 'Non';
    
    // Test 4: Tester l'export Excel
    try {
        $testExport = new App\Exports\ProductsExport();
        $results['excel_class_ok'] = 'Oui';
    } catch (\Exception $e) {
        $results['excel_class_error'] = $e->getMessage();
    }
    
    // Test 5: Tester l'export PDF
    try {
        $dataTable = App\Models\Product::with('categories', 'stores')->get();
        $results['products_count'] = $dataTable->count();
    } catch (\Exception $e) {
        $results['products_error'] = $e->getMessage();
    }
    
    // Afficher tous les résultats
    echo "<h1>Debug Exports</h1>";
    echo "<pre>";
    print_r($results);
    echo "</pre>";
    
    // Afficher toutes les routes
    echo "<h2>Routes disponibles</h2>";
    $routes = collect(Route::getRoutes())->map(function($route) {
        return [
            'uri' => $route->uri(),
            'name' => $route->getName(),
            'methods' => implode('|', $route->methods()),
        ];
    })->filter(function($route) {
        return str_contains($route['uri'], 'product') || str_contains($route['uri'], 'export');
    })->values();
    
    echo "<pre>";
    print_r($routes->toArray());
    echo "</pre>";
    
    return;
});

Route::get('/test-export-direct', function() {
    echo "<h1>Test Export Direct</h1>";
    
    try {
        echo "<p>Étape 1: Vérification de la classe ProductsExport...</p>";
        if (!class_exists('App\Exports\ProductsExport')) {
            throw new Exception("Classe ProductsExport non trouvée");
        }
        echo "<p style='color:green'>✓ OK</p>";
        
        echo "<p>Étape 2: Création de l'instance...</p>";
        $export = new App\Exports\ProductsExport();
        echo "<p style='color:green'>✓ OK</p>";
        
        echo "<p>Étape 3: Tentative de téléchargement...</p>";
        return Excel::download($export, 'products.xlsx');
        
    } catch (\Exception $e) {
        echo "<div style='color:red; border:1px solid red; padding:10px; margin:10px;'>";
        echo "<h3>ERREUR</h3>";
        echo "<p><strong>Message:</strong> " . $e->getMessage() . "</p>";
        echo "<p><strong>Fichier:</strong> " . $e->getFile() . "</p>";
        echo "<p><strong>Ligne:</strong> " . $e->getLine() . "</p>";
        echo "<p><strong>Code:</strong> " . $e->getCode() . "</p>";
        echo "<p><strong>Trace:</strong></p>";
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
        echo "</div>";
    }
});

use App\Http\Controllers\NewExportController;

// =============================================
// NOUVELLES ROUTES D'EXPORT - INDÉPENDANTES
// =============================================
Route::prefix('new-exports')->name('new.')->group(function () {
    
    // Export Excel
    Route::get('/products/excel', [NewExportController::class, 'exportExcel'])
         ->name('products.excel');
    
    // Export PDF
    Route::get('/products/pdf', [NewExportController::class, 'exportPdf'])
         ->name('products.pdf');
    
    // Version simplifiée (sans images)
    Route::get('/products/pdf-simple', [NewExportController::class, 'exportPdfSimple'])
         ->name('products.pdf-simple');
    
    // Export CSV (ultra léger)
    Route::get('/products/csv', [NewExportController::class, 'exportCsv'])
         ->name('products.csv');
});
Route::get('/exports/products/html', [NewExportController::class, 'exportHtmlReport'])
     ->name('exports.products.html');