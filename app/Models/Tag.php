<?php

namespace App\Models;

use DB;

class Tag extends Base
{
    protected $guarded = [];

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
            ->groupBy('tags.id')
            ->get();
        return $data;
    }

}
