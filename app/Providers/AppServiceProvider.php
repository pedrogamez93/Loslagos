<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Landing;

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
        \Carbon\Carbon::setLocale('es');
    
        try {
            $landings = \App\Models\Landing::all(); // Intenta obtener todos los landings
            view()->share('landings', $landings);
        } catch (\Exception $e) {
            // Maneja el error o ignóralo
            view()->share('landings', collect()); // Comparte una colección vacía si hay un error
        }
    }
}