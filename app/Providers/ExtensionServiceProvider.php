<?php

namespace App\Providers;

use App\Extensions\Illuminate\Foundation\Console\TestMakeCommand;
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
        $this->app->extend('command.test.make', function ($command, $app) {
            return new TestMakeCommand($app['files']);
        });
    }
}
