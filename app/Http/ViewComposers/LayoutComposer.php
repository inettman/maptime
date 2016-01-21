<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Region;
use App\City;
use App\Encor;

class LayoutComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('navbarRegions', Region::Navbar()->get());
        $view->with('sidebarCities', City::Sidebar()->get());
        $view->with('encors', Encor::Random()->get());
    }
}
