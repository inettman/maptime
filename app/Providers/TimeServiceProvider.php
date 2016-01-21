<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TimeServiceProvider extends ServiceProvider
{   
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Time',
            'App\Services\Time\Geonames'
        );
    }
}
