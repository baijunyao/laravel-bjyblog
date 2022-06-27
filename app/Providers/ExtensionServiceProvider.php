<?php

declare(strict_types=1);

namespace App\Providers;

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
    }
}
