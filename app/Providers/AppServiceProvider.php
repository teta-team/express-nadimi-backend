<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer([
            'layouts.en.footer',
            'layouts.ar.footer',
            'layouts.fa.footer',
        ], function ($view) {
            $view->with(
                'footerProducts',
                Product::query()
                    ->where('hidden', false)
                    ->orderBy('sort_order')
                    ->orderBy('name')
                    ->get()
            );
        });
    }
}
