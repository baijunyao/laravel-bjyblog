<?php

namespace App\Models;

class Article extends Base
{

    /**
     * 不允许被批量赋值的属性
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 添加文章
     *
     * @param array $data
     * @return bool|mixed
     */
    public function addData($data)
    {
        // 如果没有描述;则截取文章内容的前200字作为描述
        if (empty($data['description'])) {
            $description = preg_replace(array('/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'), '', $data['content']);
            $data['description'] = reSubstr($description, 0, 200, true);
        }

        // 给文章的插图添加水印;并取第一张图片作为封面图
        $data['cover'] = $this->getCover($data['content']);

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
            $articleTag->addTagIds($result, $tag_ids);

            return $result;
        }else{
            return false;
        }
    }

    /**
     * 给文章的插图添加水印;并取第一张图片作为封面图
     *
     * @param $content
     * @return string
     */
    public function getCover($content)
    {
        // 获取文章中的全部图片
        preg_match_all('/!\[.*\]\((.*.[jpg|jpeg|png|gif].*)\)/i', $content, $images);
        if (empty($images[1])) {
            $cover = '/uploads/article/default.jpg';
        } else {
            // 循环给图片添加水印
            foreach ($images[1] as $k => $v) {
                $image = explode(' ', $v);
                $file = public_path().$image[0];
                AddTextWater($file, 'baijunyao.com');
                // 取第一张图片作为封面图
                if ($k == 0) {
                    $cover = $image[0];
                }
            }
        }
        return $cover;
    }

    /**
     * 后台文章列表
     *
     * @return mixed
     */
    public function getAdminList()
    {
        $data = $this
            ->select('articles.*', 'c.name as category_name')
            ->join('categories as c', 'articles.category_id', 'c.id')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return $data;
    }
}
