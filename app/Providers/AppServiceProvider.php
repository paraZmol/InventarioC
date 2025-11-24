<?php

namespace App\Providers;

use App\Models\MovimientoInventario;
use App\Observers\MovimientoObserver;
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
        //vigilar el movimiento de inventario
        MovimientoInventario::observe(MovimientoObserver::class);
    }
}
