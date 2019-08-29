<?php

namespace App\Models;

/**
 * Class ArticleTag
 *
 * @property int $article_id 文章id
 * @property int $tag_id     标签id
 *
 * @author  hanmeimei
 */
class ArticleTag extends Base
{
    /**
     * 为文章批量插入标签
     *
     * @param int   $article_id
     * @param array $tag_ids
     *
     * @return bool
     *
     * @author hanmeimei
     */
    public function addTagIds(int $article_id, array $tag_ids)
    {
        // 组合批量插入的数据
        $data = array_map(function ($tag) use ($article_id) {
            return [
                'article_id' => $article_id,
                'tag_id'     => $tag,
            ];
        }, $tag_ids);

        return $this->insert($data);
    }
}
