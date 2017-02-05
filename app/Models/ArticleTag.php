<?php

namespace App\Models;

class ArticleTag extends Base
{
    protected $guarded = [];

    /**
     * 为文章批量插入标签
     *
     * @param $article_id
     * @param $tag_ids
     */
    public function addTagIds($article_id, $tag_ids)
    {
        // 先删除此文章下的所有标签
        $map = [
            'article_id' => $article_id
        ];
        $this->deleteData($map);
        // 循环插入
        foreach ($tag_ids as $v) {
            $data = [
                'article_id' => $article_id,
                'tag_id' => $v
            ];
            $this->addData($data);
        }
    }

}
