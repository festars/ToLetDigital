<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use PragmaRX\Countries\Package\Countries;

class CurrencyComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $currencies;
    /**
     * Create a new profile composer.
     *
     * @param UserRepository $users
     *
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->currencies = Cache::remember('currencies', 1440, function () {
            return Countries::currencies()->pluck('iso.code');
        });

    }
    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('currencies', $this->currencies);
    }
}
