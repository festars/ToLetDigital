<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class PaymentModeComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $payments;
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
        $this->payments = Cache::remember('payments', 1440, function () {
            return config('tolet.payments');
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
        $view->with('payments', $this->payments);
    }
}
