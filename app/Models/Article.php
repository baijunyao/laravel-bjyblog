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
            // 循环给图片添加水印
            foreach ($cover[1] as $k => $v) {
                $image = explode(' ', $v);
                $file = public_path().$image[0];
                AddTextWater($file, 'baijunyao.com');
                // 取第一张图片作为封面图
                if ($k == 0) {
                    $data['cover'] = $image[0];
                }
            }
        }
        $tag_ids = $data['tag_ids'];
        unset($data['tag_ids']);

        //添加数据
        $result=$this
            ->create($data)
            ->id;
        if ($result) {
            session()->flash('alert-message','添加成功');
            session()->flash('alert-class','alert-success');

            // 给文章添加标签
            $articleTag = new ArticleTag();
            foreach ($tag_ids as $v) {
                $tag_data = [
                    'article_id' => $result,
                    'tag_id' => $v
                ];
                $articleTag->addData($tag_data);
            }
            return $result;
        }else{
            return false;
        }
    }

}
