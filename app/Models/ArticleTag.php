<?php

declare(strict_types=1);

namespace App\Models;

class ArticleTag extends Base
{
    /**
     * @param array<int,int> $tag_ids
     */
    public function addTagIds(int $article_id, array $tag_ids): bool
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
