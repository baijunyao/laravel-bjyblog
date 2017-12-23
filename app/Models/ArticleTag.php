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
        // 先删除此文章下的所有标签
        $map = [
            'article_id' => $article_id
        ];
        $this->whereMap($map)->forceDelete();
        // 循环插入
        foreach ($tag_ids as $v) {
            $data = [
                'article_id' => $article_id,
                'tag_id' => $v
            ];
            $this->storeData($data);
        }
    }

    /**
     * 传递一个文章id数组;获取标签名
     *
     * @param $ids
     * @return array
     */
    public function getTagNameByArticleIds($ids)
    {
        // 获取标签数据
        $tag = $this
            ->select('article_tags.article_id as id', 't.id as tag_id', 't.name')
            ->join('tags as t', 'article_tags.tag_id', 't.id')
            ->whereIn('article_tags.article_id', $ids)
            ->get();
        $data = [];
        // 组合成键名是文章id 键值是 标签数组
        foreach ($tag as $k => $v) {
            $data[$v->id][] = $v;
        }
        return $data;
    }


}
