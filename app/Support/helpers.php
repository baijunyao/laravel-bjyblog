<?php

use HyperDown\Parser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('ajax_return')) {
    /**
     * ajax返回数据
     *
     * @param string $data        需要返回的数据
     * @param int    $status_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function ajax_return($status_code = 200, $data = '')
    {
        //如果如果是错误 返回错误信息
        if ($status_code != 200) {
            //增加status_code
            $data = ['status_code' => $status_code, 'message' => $data];

            return response()->json($data, $status_code);
        }
        //如果是对象 先转成数组
        if (is_object($data)) {
            $data = $data->toArray();
        }
        if (!function_exists('to_string')) {
            /**
             * 将数组递归转字符串
             *
             * @param array $arr 需要转的数组
             *
             * @return array 转换后的数组
             */
            function to_string($arr)
            {
                // app 禁止使用和为了统一字段做的判断
                $reserved_words = [];
                foreach ($arr as $k => $v) {
                    //如果是对象先转数组
                    if (is_object($v)) {
                        $v = $v->toArray();
                    }
                    //如果是数组；则递归转字符串
                    if (is_array($v)) {
                        $arr[$k] = to_string($v);
                    } else {
                        //判断是否有移动端禁止使用的字段
                        in_array($k, $reserved_words, true) && die('不允许使用【' . $k . '】这个键名 —— 此提示是helper.php 中的ajaxReturn函数返回的');
                        //转成字符串类型
                        $arr[$k] = strval($v);
                    }
                }

                return $arr;
            }
        }

        //判断是否有返回的数据
        if (is_array($data)) {
            //先把所有字段都转成字符串类型
            $data = to_string($data);
        }

        return response()->json($data, $status_code);
    }
}

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

if (!function_exists('get_uid')) {
    /**
     * 返回登录的用户id
     *
     * @return mixed 用户id
     */
    function get_uid()
    {
        return Auth::id();
    }
}

if (!function_exists('save_to_file')) {
    /**
     * 将数组已json格式写入文件
     *
     * @param string $fileName 文件名
     * @param array  $data     数组
     */
    function save_to_file($fileName = 'test', $data = [])
    {
        $path = storage_path('tmp' . DIRECTORY_SEPARATOR);
        is_dir($path) || mkdir($path);
        $fileName = str_replace('.php', '', $fileName);
        $fileName = $path . $fileName . '_' . date('Y-m-d_H-i-s', time()) . '.php';
        file_put_contents($fileName, json_encode($data));
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

if (!function_exists('word_time')) {
    /**
     * 把日期或者时间戳转为距离现在的时间
     *
     * @param $time
     *
     * @return bool|string
     */
    function word_time($time)
    {
        // 如果是日期格式的时间;则先转为时间戳
        if (!is_int($time)) {
            $time = strtotime($time);
        }
        $int = time() - $time;
        if ($int <= 2) {
            $str = sprintf('刚刚', $int);
        } elseif ($int < 60) {
            $str = sprintf('%d秒前', $int);
        } elseif ($int < 3600) {
            $str = sprintf('%d分钟前', floor($int / 60));
        } elseif ($int < 86400) {
            $str = sprintf('%d小时前', floor($int / 3600));
        } elseif ($int < 1728000) {
            $str = sprintf('%d天前', floor($int / 86400));
        } else {
            $str = date('Y-m-d H:i:s', $time);
        }

        return $str;
    }
}

if (!function_exists('markdown_to_html')) {
    /**
     * 把markdown转为html
     *
     * @param $markdown
     *
     * @return mixed|string
     */
    function markdown_to_html($markdown)
    {
        // 正则匹配到全部的iframe
        preg_match_all('/&lt;iframe.*iframe&gt;/', $markdown, $iframe);
        // 如果有iframe 则先替换为临时字符串
        if (!empty($iframe[0])) {
            $tmp = [];
            // 组合临时字符串
            foreach ($iframe[0] as $k => $v) {
                $tmp[] = '【iframe' . $k . '】';
            }
            // 替换临时字符串
            $markdown = str_replace($iframe[0], $tmp, $markdown);
            // 讲iframe转义
            $replace = array_map(function ($v) {
                return htmlspecialchars_decode($v);
            }, $iframe[0]);
        }
        // markdown转html
        $parser = new Parser();
        $html   = $parser->makeHtml($markdown);
        $html   = str_replace('<code class="', '<code class="lang-', $html);
        // 将临时字符串替换为iframe
        if (!empty($iframe[0])) {
            $html = str_replace($tmp, $replace, $html);
        }

        return $html;
    }
}

if (!function_exists('strip_html_tags')) {
    /**
     * 删除指定标签
     *
     * @param array  $tags    删除的标签  数组形式
     * @param string $str     html字符串
     * @param bool   $content true保留标签的内容text
     *
     * @return mixed
     */
    function strip_html_tags($tags, $str, $content = true)
    {
        $html = [];
        // 是否保留标签内的text字符
        if ($content) {
            foreach ($tags as $tag) {
                $html[] = '/(<' . $tag . '.*?>(.|\n)*?<\/' . $tag . '>)/is';
            }
        } else {
            foreach ($tags as $tag) {
                $html[] = '/(<(?:\\/' . $tag . '|' . $tag . ')[^>]*>)/is';
            }
        }

        return preg_replace($html, '', $str);
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

if (!function_exists('redis')) {
    /**
     * redis的便捷操作方法
     *
     * @param $key
     * @param null $value
     * @param null $expire
     *
     * @return bool|string
     */
    function redis($key = null, $value = null, $expire = null)
    {
        if ($key === null) {
            return app('redis');
        }

        if ($value === null) {
            $content = Redis::get($key);
            if ($content === null) {
                return null;
            }

            return $content === null ? null : unserialize($content);
        }

        Redis::set($key, serialize($value));
        if ($expire !== null) {
            Redis::expire($key, $expire);
        }
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
