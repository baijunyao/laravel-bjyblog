<?php

declare(strict_types=1);

use App\Support\TencentTranslate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use PHPHtmlParser\Dom;

if (!function_exists('watermark')) {
    /**
     * 给图片添加文字水印
     *
     * @param string $file e.g. /images/default/article.png
     */
    function watermark(string $file, string $text, string $color = '#0B94C1'): void
    {
        $local_file = public_path($file);
        $extension  = strtolower(pathinfo($local_file, PATHINFO_EXTENSION));

        if ($extension !== 'gif') {
            $image = Image::make($local_file);
            $image->text($text, $image->width() - 20, $image->height() - 30, function ($font) use ($color) {
                $font->file(public_path('fonts/msyh.ttf'));
                $font->size(15);
                $font->color($color);
                $font->align('right');
                $font->valign('bottom');
            });
            $image->save($local_file);

            if (in_array('oss_uploads', config('bjyblog.upload_disks'), true)) {
                $content = file_get_contents($local_file);

                if ($content !== false) {
                    Storage::disk('oss_uploads')->put($file, $content);
                }
            }
        }
    }
}

if (!function_exists('generate_english_slug')) {
    /**
     * Generate English slug
     */
    function generate_english_slug(string $content): string
    {
        $locale = config('app.locale');

        if ('en' !== $locale) {
            try {
                $tencent_translate = app()->make(TencentTranslate::class);
                $content           = $tencent_translate->toEnglish($content);
            } catch (Exception $exception) {
                $content = '';
            }
        }

        return $content === '' ? '' : Str::slug($content);
    }
}

if (!function_exists('cdn_url')) {
    /**
     * Generate a url for the CDN.
     */
    function cdn_url(string $path): string
    {
        return Str::startsWith($path, 'http') ? $path : URL::assetFrom(config('bjyblog.cdn_domain'), $path);
    }
}

if (!function_exists('format_url')) {
    /**
     * Format URL
     */
    function format_url(string $url): string
    {
        if (preg_match('/^http(s)?:\/\//', $url) === 0) {
            $url = 'http://' . $url;
        }

        return strtolower(rtrim($url, '/'));
    }
}

if (!function_exists('mail_is_configured')) {
    /**
     * Check mail config
     */
    function mail_is_configured(): bool
    {
        $mail_config = [
            config('mail.default'),
            config('mail.mailers.smtp.encryption'),
            config('mail.mailers.smtp.port'),
            config('mail.mailers.smtp.host'),
            config('mail.mailers.smtp.username'),
            config('mail.mailers.smtp.password'),
            config('mail.from.address'),
            config('mail.from.name'),
        ];

        return count(array_filter($mail_config)) === 8;
    }
}

if (!function_exists('get_image_paths_from_html')) {
    /**
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     *
     * @return array<int,string>
     */
    function get_image_paths_from_html(string $html): array
    {
        $dom = new Dom();
        $dom->loadStr($html);
        /** @var \PHPHtmlParser\Dom\HtmlNode[] $image_tags */
        $image_tags  = $dom->find('img');
        $image_paths = [];

        foreach ($image_tags as $image_tag) {
            $image_path = $image_tag->getAttribute('src');
            if ($image_path !== null) {
                $image_paths[] = $image_path;
            }
        }

        return $image_paths;
    }
}

if (!function_exists('translate')) {
    /**
     * Translate the given message, only return string (for PHPStan).
     *
     * @param array<string,string> $replace
     */
    function translate(string $key, $replace = [], string $locale = null): string
    {
        $result = __($key, $replace, $locale);

        if (is_array($result)) {
            throw new InvalidArgumentException('Only supports string translation, if you need to return an array, please use the __() method');
        }

        return $result ?? '';
    }
}
