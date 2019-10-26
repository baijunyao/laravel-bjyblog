<?php

namespace Tests\Unit\Support;

use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function testFormatUrl()
    {
        static::assertEquals('http://baijunyao.com', format_url('baijunyao.com'));
        static::assertEquals('http://baijunyao.com', format_url('http://baijunyao.com'));
        static::assertEquals('https://baijunyao.com', format_url('https://baijunyao.com'));
        static::assertEquals('https://baijunyao.com', format_url('https://BaiJunYao.com'));
        static::assertEquals('https://baijunyao.com', format_url('https://baijunyao.com/'));
    }

    public function testIsTrue()
    {
        static::assertTrue(is_true('true'));
        static::assertTrue(is_true(true));
    }

    public function testIsFalse()
    {
        static::assertTrue(is_false('false'));
        static::assertTrue(is_false(false));
    }
}
