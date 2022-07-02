<?php

declare(strict_types=1);

namespace App\Providers;

use App\Extensions\LaravelIdeHelper\Console\ModelsCommand;
use Illuminate\Support\ServiceProvider;

class ExtensionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->extend(\Illuminate\Foundation\Console\TestMakeCommand::class, function ($command, $app) {
            return new \App\Extensions\Illuminate\Foundation\Console\TestMakeCommand($app['files']);
        });

        $this->app->extend('command.ide-helper.models', function ($command, $app) {
            return new ModelsCommand($app['files']);
        });
    }
}
