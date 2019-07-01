<?php

namespace Tests;

use App\Providers\ComposerServiceProvider;

abstract class TestCase extends \Baijunyao\LaravelTestSupport\TestCase
{
    use CreatesApplication;
    protected static $bootstrappers = [
        ComposerServiceProvider::class,
    ];

    protected function setUp(): void
    {
        parent::setUp();

        app('translator')->setLocale('zh-CN');
    }
}
