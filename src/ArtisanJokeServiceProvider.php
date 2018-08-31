<?php

namespace Laracademy\Commands;

use Illuminate\Support\ServiceProvider;

class ArtisanJokeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.laracademy.artisan-joke', function($app) {
            return $app['Laracademy\Commands\JokeCommand'];
        });

        $this->commands('command.laracademy.artisan-joke');
    }
}
