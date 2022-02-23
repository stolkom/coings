<?php

namespace App\Providers;

use App\Rules\ExtendedExists;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('extended_exists', function($attribute, $value, $parameters)
        {
            return (new ExtendedExists())->passes($attribute, $value, $parameters);
        });
    }
}
