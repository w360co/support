<?php


namespace W360\Support;

use Illuminate\Support\ServiceProvider;

class SupportServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../tsconfig.json' => base_path('tsconfig.json'),
            ], 'react');

            $this->publishes([
                __DIR__ . '/../resources/js' => resource_path('js'),
            ], 'react');

            $this->publishes([
                __DIR__ . '/../resources/sass' => resource_path('sass'),
            ], 'react');

            $this->publishes([
                __DIR__ . '/../locales' => public_path('locales'),
            ], 'react');

            // Registering package commands.
            // $this->commands([]);
        }
    }


}
