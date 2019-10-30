<?php

namespace Rits\Breadcrumbs\Providers;

use Illuminate\Support\ServiceProvider;
use Rits\Breadcrumbs\Breadcrumbs;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('breadcrumbs', function () {
            return (new Breadcrumbs())->setAttribute('class', 'breadcrumb');
        });
    }
}
