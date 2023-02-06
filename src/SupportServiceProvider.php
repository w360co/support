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
            ], 'support-react');

            $this->publishes([
                __DIR__ . '/../resources/js' => resource_path('js'),
            ], 'support-react');

            $this->publishes([
                __DIR__ . '/../resources/sass' => resource_path('sass'),
            ], 'support-react');

            $this->publishes([
                __DIR__ . '/../locales' => public_path('locales'),
            ], 'support-react');

            $this->publishes([
                __DIR__ . '/../stubs/docker.vite.config.js' => base_path('vite.config.js'),
            ], 'support-docker');

            $this->publishes([
                __DIR__ . '/../stubs/laragon.vite.config.js' => base_path('vite.config.js'),
            ], 'support-laragon');


            // Registering package commands.
            // $this->commands([]);
        }
    }


}
