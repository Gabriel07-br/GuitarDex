<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;//usar essa importação para não dar erro de tamanho de string no banco de dados
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
        Schema::defaultStringLength(191); // linha para não dar erro de tamanho de string no banco de dados
    }
}
