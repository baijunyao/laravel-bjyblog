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
    public function toArray($request): array
    {
        /** @var SocialiteUser $socialite_user */
        $socialite_user = $this->socialiteUser;

        /** @var Article $article */
        $article = $this->article;

        return [
            'id'             => $this->id,
            'content'        => $this->content,
            'is_audited'     => $this->is_audited,
            'socialite_user' => [
                'id'   => $socialite_user->id,
                'name' => $socialite_user->name,
            ],
            'article' => [
                'id'    => $article->id,
                'title' => $article->title,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
