<?php

namespace App\Models;

class Comment extends Base
{

    protected $guarded = [];

    public function getNewData()
    {
        $data = $this->select('comments.*')
            ->join('articles as a', 'comments.article_id', 'a.id')
            ->join('oauth_users as ou', 'ou.id', 'comments.oauth_user_id')
            ->orderBy('created')
            ->get();
        p($data);
    }
}
