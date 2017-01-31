<?php

namespace App\Models;

class Article extends Base
{

    /**
     * 可以被批量赋值的属性
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'content',
        'keywords',
        'description',
        'is_top',
        'click'
    ];

    public function addData($data)
    {
        // 如果没有描述;则截取文章内容的前200字作为描述
        if (empty($data['description'])) {
            $description = preg_replace(array('/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'), '', $data['content']);
            $data['description'] = reSubstr($description, 0, 200, true);
        }

        // 获取第一张图片作为封面图
        preg_match_all('/!\[.*\]\((.*.[jpg|jpeg|png|gif].*)\)/i', $data['content'], $cover);
        if (empty($cover[1])) {
            $data['cover'] = '/uploads/article/default.jpg';
        } else {
            // 去掉 图片的title
            $image = array_map(function ($v) {
                $tmp = explode(' ', $v);
                return $tmp[0];
            }, $cover[1]);

            // 取第一张图片作为封面图
            $data['cover'] = $cover[0];

            // 循环给图片添加水印
            foreach ($image as $k => $v) {
                $file = public_path().$v;
                AddTextWater($file, 'baijunyao.com');
            }
        }
        


        p($data['cover']);die;


    }

}
