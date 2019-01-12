<?php

namespace App\Providers;

use App\Http\Composers\CountryComposer;
use App\Http\Composers\CurrencyComposer;
use App\Http\Composers\PaymentModeComposer;
use App\Http\Composers\PeriodComposer;
use App\Http\Composers\PropertyComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', CountryComposer::class);
        view()->composer('*', CurrencyComposer::class);
        view()->composer('*', PeriodComposer::class);
        view()->composer('*', PaymentModeComposer::class);
        //view()->composer('*', PropertyComposer::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
