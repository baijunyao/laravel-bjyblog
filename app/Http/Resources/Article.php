<?php

declare(strict_types=1);

namespace App\Http\Resources;

class Article extends Base
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array<string,mixed>
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'category_id' => $this->category_id,
            'title'       => $this->title,
            'slug'        => $this->slug,
            'author'      => $this->author,
            'markdown'    => $this->markdown,
            'html'        => $this->html,
            'description' => $this->description,
            'keywords'    => $this->keywords,
            'cover'       => $this->cover,
            'is_top'      => $this->is_top,
            'views'       => $this->views,
            'tags'        => $this->tags,
            'category'    => $this->category,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
            'deleted_at'  => $this->deleted_at,
        ];
    }
}
