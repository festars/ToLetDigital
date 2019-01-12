<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use PragmaRX\Countries\Package\Countries;

class CountryComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $countries;
    /**
     * Create a new profile composer.
     *
     * @param UserRepository $users
     *
     * @return void
     */
    public function __construct()
    {
        $this->countries = Cache::remember('countries', 1440, function () {
            return Countries::all()->pluck('name.common','cca3');
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
        $view->with('countries', $this->countries);
    }
}
