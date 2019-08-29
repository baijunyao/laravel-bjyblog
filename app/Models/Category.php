<?php

namespace App\Models;

/**
 * Class Category
 *
 * @property int    $id          自增ID
 * @property string $name        分类名称
 * @property string $slug        slug
 * @property string $keywords    关键词
 * @property string $description 描述
 * @property bool   $sort        排序
 * @property bool   $pid         排序
 *
 * @author  hanmeimei
 */
class Category extends Base
{
    /**
     * 一对多关联文章
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getUrlAttribute()
    {
        $parameters = [$this->id];

        if (config('bjyblog.seo.use_slug') === 'true') {
            $parameters[] = $this->slug;
        }

        return url('category', $parameters);
    }
}
