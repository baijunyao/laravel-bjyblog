<?php

namespace Tests;

use App\Providers\ComposerServiceProvider;
use Baijunyao\LaravelTestSupport\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected static $bootstrappers = [
        ComposerServiceProvider::class,
    ];

    public function setUp(): void
    {
        parent::setUp();

        app('translator')->setLocale('zh-CN');
    }
}
