<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->helpers as $helper) {
            $helper_path = app_path() . '/Helpers/' . $helper . '.php';

            if (File::isFile($helper_path)) {
                require_once $helper_path;
            }
        }
    }

    /**
     * Appends a helper file to be loaded with the app
     *
     * @var array
     */
    protected $helpers = [
        'helpers'
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
