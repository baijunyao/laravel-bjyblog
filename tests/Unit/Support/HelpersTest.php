<?php

namespace Tests\Unit\Support;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function testFormatUrl()
    {
        $this->assertEquals('http://baijunyao.com', format_url('baijunyao.com'));
        $this->assertEquals('http://baijunyao.com', format_url('http://baijunyao.com'));
        $this->assertEquals('https://baijunyao.com', format_url('https://baijunyao.com'));
        $this->assertEquals('https://baijunyao.com', format_url('https://BaiJunYao.com'));
        $this->assertEquals('https://baijunyao.com', format_url('https://baijunyao.com/'));
    }
}
