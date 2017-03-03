<?php

namespace App\Models;

class Comment extends Base
{

    protected $guarded = [];

    /**
     * 获取最新评论
     *
     * @return mixed
     */
    public function getNewData()
    {
        $data = $this->select('comments.content', 'comments.created_at', 'ou.nickname', 'ou.avatar', 'a.title', 'a.id as article_id')
            ->join('articles as a', 'comments.article_id', 'a.id')
            ->join('oauth_users as ou', 'ou.id', 'comments.oauth_user_id')
            ->orderBy('comments.created_at', 'desc')
            ->where('ou.is_admin', '<>', 1)
            ->limit(20)
            ->get();
        foreach ($data as $k => $v) {
            // 截取文章标题
            $data[$k]->title = reSubstr($v->title, 0, 20);
            // 处理有表情时直接截取会把img表情截断的问题
            $content = strip_tags(htmlspecialchars_decode($v->content));
            if (mb_strlen($content) > 10) {
                $data[$k]->content = reSubstr($content,0,40);
            }else{
                $data[$k]->content = htmlspecialchars_decode($v->content);
            }
        }
        return $data;
    }
}
