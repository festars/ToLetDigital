<?php
namespace App\Http\Composers;
use App\Listing;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class PropertyComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $properties;
    /**
     * Create a new profile composer.
     *
     * @param UserRepository $users
     *
     * @return void
     */
    public function __construct()
    {
         $this->properties = Cache::remember('properties', 1440, function () {
            return Listing::where("agent_id",Auth::user()->id)->pluck("name","id");
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
        $view->with('properties', $this->properties);
    }
}
