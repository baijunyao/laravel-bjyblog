<?php

declare(strict_types=1);

namespace App\Models;

class ArticleHistory extends Base
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
