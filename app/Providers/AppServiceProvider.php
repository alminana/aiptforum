<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

//use Illuminate\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       // parent::register(); // Make sure to call the parent's register method
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTelescope();

        if ($this->app->isLocal()) {
            $this->registerTelescope();
        }
    }

    protected function registerTelescope()
{
    if (class_exists('Telescope')) {
        Telescope::ignoreMigrations();
        Telescope::filter(function () {
            return $this->app->environment('local');
        });
    }
}
}
