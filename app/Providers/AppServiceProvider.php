<?php

namespace App\Providers;

use App\Models\Company;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Models\Sale;
use App\Models\Expense;
use App\Models\Achat;
use App\Observers\StockObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('layouts.head', function ($view) {
            try {
                $company = Company::latest()->first();
                $companyName = $company?->name ?? config('app.name');
            } catch (\Throwable $e) {
                $companyName = config('app.name');
            }

            $view->with('companyName', $companyName);
        });


        Sale::observe(StockObserver::class);
        Expense::observe(StockObserver::class);
        Achat::observe(StockObserver::class);
    }
}
