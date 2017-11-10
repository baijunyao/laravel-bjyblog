<?php

namespace App\Models;

use DB;

class Tag extends Base
{
    /**
     * 获取标签下的文章数统计
     *
     * @return mixed
     */
    public function getArticleCount()
    {
        $prefix = config('database.connections.mysql.prefix');
        $data = $this->select(DB::raw($prefix.'tags.*, count('.$prefix.'at.article_id) as article_count'))
            ->join('article_tags as at', 'at.tag_id', 'tags.id')
            ->rightJoin('articles as a', 'a.id', 'at.article_id')
            ->where('a.deleted_at', null)
            ->groupBy('tags.id')
            ->get();
        return $data;
    }

    /**
     * 删除数据
     *
     * @param array $map
     * @return bool
     */
    public function destroyData($map)
    {
        // 先获取分类id
        $tagIdArray = $this
            ->whereMap($map)
            ->pluck('id')
            ->toArray();
        // 获取分类下的文章数
        $articleCount = ArticleTag::whereIn('tag_id', $tagIdArray)->count();
        // 如果分类下存在文章；则需要下删除文章
        if ($articleCount !== 0) {
            flash_message('请先删除此标签下的文章', false);
            return false;
        }
        return parent::destroyData($map);
    }


}
