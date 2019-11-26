<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('send_email')) {
    /**
     * 发送邮件函数
     *
     * @param $email            收件人邮箱  如果群发 则传入数组
     * @param $name             收件人名称
     * @param $subject          标题
     * @param array  $data     邮件模板中用的变量 示例：['name'=>'帅白','phone'=>'110']
     * @param string $template 邮件模板
     *
     * @return array 发送状态
     */
    function send_email($email, $name, $subject, $data = [], $template = 'emails.test')
    {
        Mail::send($template, $data, function ($message) use ($email, $name, $subject) {
            //如果是数组；则群发邮件
            if (is_array($email)) {
                foreach ($email as $k => $v) {
                    $message->to($v, $name)->subject($subject);
                }
            } else {
                $message->to($email, $name)->subject($subject);
            }
        });
        if (count(Mail::failures()) > 0) {
            $data = ['status_code' => 500, 'message' => '邮件发送失败'];
        } else {
            $data = ['status_code' => 200, 'message' => '邮件发送成功'];
        }

        return $data;
    }
}

if (!function_exists('re_substr')) {
    /**
     * 字符串截取，支持中文和其他编码
     *
     * @param string $str     需要转换的字符串
     * @param int    $start   开始位置
     * @param string $length  截取长度
     * @param bool   $suffix  截断显示字符
     * @param string $charset 编码格式
     *
     * @return string
     */
    function re_substr($str, $start, $length, $suffix = true, $charset = 'utf-8')
    {
        $slice = mb_substr($str, $start, $length, $charset);
        $omit  = mb_strlen($str) >= $length ? '...' : '';

        return $suffix ? $slice . $omit : $slice;
    }
}

if (!function_exists('add_text_water')) {
    /**
     * 给图片添加文字水印
     *
     * @param $file
     * @param $text
     * @param string $color
     *
     * @return mixed
     */
    function add_text_water($file, $text, $color = '#0B94C1')
    {
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if ($extension !== 'gif') {
            $image = Image::make($file);
            $image->text($text, $image->width() - 20, $image->height() - 30, function ($font) use ($color) {
                $font->file(public_path('fonts/msyh.ttf'));
                $font->size(15);
                $font->color($color);
                $font->align('right');
                $font->valign('bottom');
            });
            $image->save($file);
        }
    }
}

if (!function_exists('generate_english_slug')) {
    /**
     * Generate English slug
     *
     * @param $content
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

        return Str::slug($content);
    }
}

if (!function_exists('cdn_url')) {
    /**
     * Generate a url for the CDN.
     *
     * @param $path
     *
     * @return string
     */
    function cdn_url($path)
    {
        return URL::assetFrom(config('bjyblog.cdn_domain'), $path);
    }
}

if (!function_exists('database_table_exists')) {
    /**
     * Is there a table in the database?
     *
     * @param $table
     *
     * @return bool
     */
    function database_table_exists($table)
    {
        return !empty(
            DB::select(
                "SHOW TABLES LIKE '" . DB::getTablePrefix() . $table . "'"
            )
        );
    }
}

if (!function_exists('column_in_database_table')) {
    /**
     * Is there a column in the database table?
     *
     * @param $table
     * @param mixed $column
     *
     * @return bool
     */
    function column_in_database_table($table, $column)
    {
        $tablePrefix = DB::getTablePrefix();
        $columns     = collect(DB::select("SHOW COLUMNS FROM {$tablePrefix}{$table}"))->pluck('Field');

        return $columns->contains($column);
    }
}

if (!function_exists('format_url')) {
    /**
     * Format URL
     *
     * @param $url
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
    function mail_is_configured()
    {
        $mailConfig = [
            config('mail.driver'),
            config('mail.encryption'),
            config('mail.port'),
            config('mail.host'),
            config('mail.username'),
            config('mail.password'),
            config('mail.from.address'),
            config('mail.from.name'),
        ];

        return count(array_filter($mailConfig)) === 8;
    }
}
