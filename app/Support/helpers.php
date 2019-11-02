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

if (!function_exists('curl_get_contents')) {
    /**
     * 使用curl获取远程数据
     *
     * @param string $url url连接
     *
     * @return string 获取到的数据
     */
    function curl_get_contents($url)
    {
        set_time_limit(0);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);                //设置访问的url地址
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);               //设置超时
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);   //用户访问代理 User-Agent
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);        //设置 referer
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);          //跟踪301
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        //返回结果
        $r = curl_exec($ch);
        curl_close($ch);

        return $r;
    }
}

if (!function_exists('is_json')) {
    /**
     * 判断字符串是否是json
     *
     * @param $json
     *
     * @return bool
     */
    function is_json($json)
    {
        json_decode($json);

        return json_last_error() == JSON_ERROR_NONE;
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

if (!function_exists('is_true')) {
    /**
     * @param $true 'true' true
     *
     * @return bool
     */
    function is_true($true)
    {
        return filter_var($true, FILTER_VALIDATE_BOOLEAN) === true;
    }
}

if (!function_exists('is_false')) {
    /**
     * @param $false 'false' false
     *
     * @return bool
     */
    function is_false($false)
    {
        return filter_var($false, FILTER_VALIDATE_BOOLEAN) === false;
    }
}
