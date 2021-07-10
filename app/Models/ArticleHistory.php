<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleHistory extends Base
{
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
