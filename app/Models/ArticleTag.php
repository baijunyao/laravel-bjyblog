<?php

namespace App\Models;

class ArticleTag extends Base
{
    /**
     * 为文章批量插入标签
     *
     * @param $article_id
     * @param $tag_ids
     */
    public function addTagIds($article_id, $tag_ids)
    {
        // 组合批量插入的数据
        $data = [];
        foreach ($tag_ids as $k => $v) {
            $data[] = [
                'article_id' => $article_id,
                'tag_id'     => $v,
            ];
        }
        $this->insert($data);
    }
}
