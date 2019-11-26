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

    public function testMailIsConfigured()
    {
        $mailConfig = [
            'mail.driver'       => 'smtp',
            'mail.encryption'   => 'ssl',
            'mail.port'         => '465',
            'mail.host'         => 'smtp.mailtrap.io',
            'mail.username'     => 'd2d524433',
            'mail.password'     => 'd2d524455',
            'mail.from.address' => 'Baijunyao Blog',
            'mail.from.name'    => 'd2d524466@inbox.mailtrap.io',
        ];
        config($mailConfig);
        static::assertTrue(mail_is_configured());
    }

    public function testMailIsNotConfigured()
    {
        $mailConfig = [
            'mail.username' => '',
            'mail.password' => '',
        ];
        config($mailConfig);
        static::assertFalse(mail_is_configured());
    }
}
