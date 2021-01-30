<?php

declare(strict_types=1);

namespace App\Http\Resources;

/**
 * @mixin \App\Models\Comment
 */
class Comment extends Base
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array<string,mixed>
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'content'        => $this->content,
            'is_audited'     => $this->is_audited,
            'socialite_user' => [
                'id'   => $this->socialiteUser->id,
                'name' => $this->socialiteUser->name,
            ],
            'article' => [
                'id'    => $this->article->id,
                'title' => $this->article->title,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
