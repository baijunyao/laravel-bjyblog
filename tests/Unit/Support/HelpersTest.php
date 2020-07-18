<?php

declare(strict_types=1);

namespace Tests\Unit\Support;

use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function testWatermark()
    {
        config([
            'bjyblog.upload_disks' => ['public', 'oss_uploads'],
        ]);

        Storage::fake('oss_uploads');

        Storage::disk('public')->putFileAs('/uploads', UploadedFile::fake()->image('for_watermark.jpg'), 'for_watermark.jpg');

        watermark('/uploads/for_watermark.jpg', 'test');

        static::assertFileExists(storage_path('app/public/uploads/for_watermark.jpg'));
    }

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
            'mail.default'                 => 'smtp',
            'mail.mailers.smtp.encryption' => 'ssl',
            'mail.mailers.smtp.port'       => '465',
            'mail.mailers.smtp.host'       => 'smtp.mailtrap.io',
            'mail.mailers.smtp.username'   => 'd2d524433',
            'mail.mailers.smtp.password'   => 'd2d524455',
            'mail.from.address'            => 'Baijunyao Blog',
            'mail.from.name'               => 'd2d524466@inbox.mailtrap.io',
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

    public function testGetImagePathsFromHtml()
    {
        $html = <<<'HTML'
<ol>
    <li>
        <img src="/images/default/article.png" alt="" />
    </li>
    <li>
        <img src="/uploads/article/5d9829577d312.png" alt="" />
    </li>
</ol>
HTML;
        static::assertSame(get_image_paths_from_html($html), [
            '/images/default/article.png',
            '/uploads/article/5d9829577d312.png',
        ]);
    }

    public function testTranslate()
    {
        static::expectException('InvalidArgumentException');

        static::assertSame(translate('Article'), '文章');

        translate('validation.between');
    }
}
