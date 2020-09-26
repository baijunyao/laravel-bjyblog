<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use PHPHtmlParser\Dom;
use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('watermark')) {
    /**
     * 给图片添加文字水印
     *
     * @param string $file  e.g. /images/default/article.png
     * @param string $text
     * @param string $color
     *
     * @return mixed
     */
    function watermark($file, $text, $color = '#0B94C1')
    {
        $localFile = public_path($file);
        $extension = strtolower(pathinfo($localFile, PATHINFO_EXTENSION));

        if ($extension !== 'gif') {
            $image = Image::make($localFile);
            $image->text($text, $image->width() - 20, $image->height() - 30, function ($font) use ($color) {
                $font->file(public_path('fonts/msyh.ttf'));
                $font->size(15);
                $font->color($color);
                $font->align('right');
                $font->valign('bottom');
            });
            $image->save($localFile);

            if (in_array('oss_uploads', config('bjyblog.upload_disks'))) {
                $content = file_get_contents($localFile);

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
     *
     * @param string $content
     *
     * @throws ErrorException
     *
     * @return string
     */
    function generate_english_slug($content)
    {
        $locale = config('app.locale');

        if ('en' !== $locale) {
            $googleTranslate = new GoogleTranslate();
            $content         =  $googleTranslate->setUrl('http://translate.google.cn/translate_a/single')
                ->setSource($locale)
                ->translate($content);
        }

        return Str::slug($content ?? '');
    }
}

if (!function_exists('cdn_url')) {
    /**
     * Generate a url for the CDN.
     *
     * @param string $path
     *
     * @return string
     */
    function cdn_url($path)
    {
        return URL::assetFrom(config('bjyblog.cdn_domain'), $path);
    }
}

if (!function_exists('format_url')) {
    /**
     * Format URL
     *
     * @param string $url
     *
     * @return string
     */
    function format_url($url)
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
        $mailConfig = [
            config('mail.default'),
            config('mail.mailers.smtp.encryption'),
            config('mail.mailers.smtp.port'),
            config('mail.mailers.smtp.host'),
            config('mail.mailers.smtp.username'),
            config('mail.mailers.smtp.password'),
            config('mail.from.address'),
            config('mail.from.name'),
        ];

        return count(array_filter($mailConfig)) === 8;
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
     * @param string|null          $key
     * @param array<string,string> $replace
     * @param string|null          $locale
     *
     * @return string
     */
    function translate($key = null, $replace = [], $locale = null)
    {
        $result = __($key, $replace, $locale);

        if (is_array($result)) {
            throw new InvalidArgumentException('Only supports string translation, if you need to return an array, please use the __() method');
        }

        return $result ?? '';
    }
}
