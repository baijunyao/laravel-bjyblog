<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"         => ":attribute必须接受。",
    "active_url"       => ":attribute不是一个有效的URL。",
    "after"            => ":attribute必须是一个在:date 之后的日期。",
    "alpha"            => ":attribute只能由字母组成。",
    "alpha_dash"       => ":attribute只能由字母、数字和斜杠组成。",
    "alpha_num"        => ":attribute只能由字母和数字组成。",
    "array"            => ":attribute必须是一个数组。",
    "before"           => ":attribute必须是一个在:date 之前的日期。",
    "between"          => [
        "numeric" => ":attribute必须介于:min -:max 之间。",
        "file"    => ":attribute必须介于:min -:max kb之间。",
        "string"  => ":attribute必须介于:min -:max 个字符之间。",
        "array"   => ":attribute必须只有:min -:max 个单元。"
    ],
    "confirmed"        => ":attribute与重复输入不匹配。",
    "date"             => ":attribute不是一个有效的日期。",
    "date_format"      => ":attribute不匹配日期格式:format。",
    "different"        => ":attribute和:other 必须不同。",
    "digits"           => ":attribute必须是:digits 位的数字。",
    "digits_between"   => ":attribute必须是介于:min 和:max 位的数字。",
    "email"            => ":attribute格式非法。",
    "exists"           => "已选的属性:attribute非法。",
    "image"            => ":attribute必须是一张图片。",
    "in"               => "已选的属性:attribute非法。",
    "integer"          => ":attribute必须是一个整数。",
    "ip"               => ":attribute必须是一个有效的IP地址。",
    "max"              => [
        "numeric" => ":attribute必须小于:max 。",
        "file"    => ":attribute必须小于:max kb。",
        "string"  => ":attribute必须小于:max 个字符。",
        "array"   => ":attribute最多只有:max 个单元。"
    ],
    "mimes"            => ":attribute必须是一个:values 类型的文件。",
    "min"              => [
        "numeric" => ":attribute必须大于:min 。",
        "file"    => ":attribute必须大于:min kb。",
        "string"  => ":attribute必须大于:min 个字符。",
        "array"   => ":attribute至少有:min 个单元。"
    ],
    "not_in"           => "已选的属性:attribute非法。",
    "numeric"          => ":attribute必须是一个数字。",
    "regex"            => ":attribute格式不正确。",
    "required"         => ":attribute不能为空。",
    "required_if"      => "当:other 为:value 时:attribute不能为空。",
    "required_with"    => "当:values 存在时:attribute不能为空。",
    "required_with_all" => " 当:values 存在时:attribute不能为空。",
    "required_without" => "当:values 不存在时:attribute不能为空。",
    "required_without_all" => "当:values 都不存在时:attribute不能为空。",
    "same"             => ":attribute和:other 必须匹配。",
    "size"             => [
        "numeric" => ":attribute大小必须是:size 。",
        "file"    => ":attribute大小必须是:size kb。",
        "string"  => ":attribute必须是:size 个字符。",
        "array"   => ":attribute必须为:size 个单元。"
    ],
    "unique"           => ":attribute已经存在。",
    "url"              => ":attribute不是一个合法的URL。",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'=>'用户名',
        'email'=>'邮箱',
        'password'=>'密码',
    ],

);
