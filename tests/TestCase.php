<?php

declare(strict_types=1);

namespace Tests;

use App\Support\TencentTranslate;
use ErrorException;
use Mockery;

abstract class TestCase extends \Baijunyao\LaravelTestSupport\TestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        $centent_translate = Mockery::mock('tencent_translate');
        $centent_translate->shouldReceive('toEnglish')->with('Store')->andReturn('store');
        $centent_translate->shouldReceive('toEnglish')->with('title')->andReturn('title');
        $centent_translate->shouldReceive('toEnglish')->with('测试标题')->andReturn('Test title');
        $centent_translate->shouldReceive('toEnglish')->with('抛出错误')->andThrow(new ErrorException('error'));

        parent::setUp();

        $this->app->setLocale('zh-CN');
        $this->app->instance(TencentTranslate::class, $centent_translate);
    }
}
