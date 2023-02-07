<?php

namespace W360\Support\Console;

use Illuminate\Console\Command;
use W360\Support\Traits\HasConsole;

class InstallCommand extends Command
{

    use HasConsole;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'w-support:install {--host=localhost}
                                              {--docker : Indicates if docker support should be installed}
                                              {--laragon : Indicates if laragon support should be installed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the W660 components and resources';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {

       // Publish...
        if ($this->option('docker')) {
            if (! $this->requireComposerPackages('laravel/sail:^1.0.1')) {
                return false;
            }
            $this->callSilent('vendor:publish', ['--tag' => 'support-docker', '--force' => true]);
            $this->callSilent('sail:install');
            if ($this->option('host') != 'localhost') {
                $this->replaceInFile("laravel.test", $this->option('host'), base_path('docker-compose.yml'));
                $this->replaceInFile("APP_URL=http://localhost", "APP_URL=https://".$this->option('host'). ":8443/" . PHP_EOL . "APP_SERVICE=" . $this->option('host') . PHP_EOL . "APP_PORT=8443", base_path('.env'));
                $this->replaceInFile("laravel.test", $this->option('host'), base_path('vite.config.js'));
                $this->replaceInFile("VITE_PUSHER_APP_CLUSTER=\"\${PUSHER_APP_CLUSTER}\"", "VITE_PUSHER_APP_CLUSTER=\"\${PUSHER_APP_CLUSTER}\"" . PHP_EOL . "VITE_ENV=development" . PHP_EOL . "VITE_APP_PRODUCTION_URL=https://" . $this->option('host') . "/" . PHP_EOL . "VITE_APP_DEVELOPMENT_URL=https://" . $this->option('host') . ":8443/", base_path('.env'));
            }
        }

        if ($this->option('laragon')) {
            $this->callSilent('vendor:publish', ['--tag' => 'support-laragon', '--force' => true]);
            if ($this->option('host') != 'localhost') {
                $this->replaceInFile("APP_URL=http://localhost", "APP_URL=https://" . $this->option('host') . ":8443/" . PHP_EOL . "APP_PORT=8443", base_path('.env'));
                $this->replaceInFile("laravel.test", $this->option('host'), base_path('vite.config.js'));
                $this->replaceInFile("VITE_PUSHER_APP_CLUSTER=\"\${PUSHER_APP_CLUSTER}\"", "VITE_PUSHER_APP_CLUSTER=\"\${PUSHER_APP_CLUSTER}\"" . PHP_EOL . "VITE_ENV=development" . PHP_EOL . "VITE_APP_PRODUCTION_URL=https://" . $this->option('host') . "/" . PHP_EOL . "VITE_APP_DEVELOPMENT_URL=https://" . $this->option('host') . ":8443/", base_path('.env'));
            }
        }


        if (file_exists(base_path('routes/web.php'))) {
            $this->replaceInFile('return view(\'welcome\');', 'return redirect()->route(\'web-support\');', base_path('routes/web.php'));
        }

        $this->callSilent('vendor:publish', ['--tag' => 'support-react', '--force' => true]);
        $this->callSilent('storage:link');


        $this->updateNodePackages(function ($packages) {
            return [

                    "@babel/preset-react" => "^7.18.6",
                    "@types/qs" => "^6.9.7",
                    "@types/react-router-dom" => "^5.3.3",
                    "@popperjs/core" => "^2.10.2",
                    "@vitejs/plugin-basic-ssl" => "^1.0.1",
                    "@vitejs/plugin-react" => "^3.0.0",
                    "@types/react" => "^17.0.45",
                    "@types/react-dom" => "^17.0.9",
                    "i18next-browser-languagedetector" => "^6.1.5",
                    "i18next-http-backend" => "^1.4.1",
                    "react" =>  "^17.0.2",
                    "react-dom" =>  "^17.0.2",
                    "react-router-dom"=>  "^6.3.0",
                    "sass"=>  "^1.57.1",
                    "ts-loader"=>  "^9.3.1",
                    "typescript"=>  "^4.8.2",
                    "bootstrap" => "^5.1.3",
                    "classnames" => "^2.3.1",
                    "react-i18next" => "^11.18.5",
                    "javascript-time-ago" => "^2.5.7",

                ] + $packages;
        });

        $this->runCommands(['npm install', 'npm run dev']);

    }

    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }


}