<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PagSeguro\Library;

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
        Library::initialize();
        Library::cmsVersion()->setName("marketplace")->setRelease("1.0.0");
        Library::moduleVersion()->setName("marketplace")->setRelease("1.0.0");
    }
}
