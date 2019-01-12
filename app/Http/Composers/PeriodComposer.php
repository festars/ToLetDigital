<?php
namespace App\Http\Composers;
use App\Period;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class PeriodComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $periods;
    /**
     * Create a new profile composer.
     *
     * @param UserRepository $users
     *
     * @return void
     */
    public function __construct()
    {
         $this->periods = Cache::remember('periods', 1440, function () {
            return Period::all()->pluck('name','id');
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
        $view->with('periods', $this->periods);
    }
}
