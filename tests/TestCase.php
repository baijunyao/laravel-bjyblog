<?php

declare(strict_types=1);

namespace Tests;

abstract class TestCase extends \Baijunyao\LaravelTestSupport\TestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        app('translator')->setLocale('zh-CN');
    }
}
