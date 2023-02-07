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
     * Configure the commands offered by the application.
     *
     * @return void
     */
    protected function configureCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'w-support');
        $this->configurePublishing();
        $this->configureCommands();
    }


    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

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
            __DIR__ . '/../public/locales' => public_path('locales'),
        ], 'support-react');

        $this->publishes([
            __DIR__ . '/../README.md' => base_path('README.md'),
        ], 'support-react');

        $this->publishes([
            __DIR__ . '/../stubs/docker.vite.config.js' => base_path('vite.config.js'),
        ], 'support-docker');

        $this->publishes([
            __DIR__ . '/../stubs/laragon.vite.config.js' => base_path('vite.config.js'),
        ], 'support-laragon');

    }


}
