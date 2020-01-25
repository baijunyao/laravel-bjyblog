<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Str;

/**
 * Class Article
 *
 * @property int    $id          文章表主键
 * @property bool   $category_id 分类id
 * @property string $title       标题
 * @property string $slug        slug
 * @property string $author      作者
 * @property string $markdown    markdown文章内容
 * @property string $html        markdown转的html页面
 * @property string $description 描述
 * @property string $keywords    关键词
 * @property string $cover       封面图
 * @property bool   $is_top      是否置顶 1是 0否
 *
 * @author  hanmeimei
 */
class Article extends Base
{
    use Searchable, CanBeLiked;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only('id', 'title', 'keywords', 'description', 'markdown');
    }

    /**
     * 过滤描述中的换行。
     *
     * @param string $value
     *
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        return str_replace(["\r", "\n", "\r\n"], '', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     *
     * @author hanmeimei
     */
    public function getHtmlAttribute($value)
    {
        return str_replace('<img src="/uploads/article', '<img src="' . cdn_url('uploads/article'), $value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 关联标签表
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }

    /**
     * 搜索文章获取文章id
     *
     * @return Collection
     */
    public function searchArticleGetId(string $wd)
    {
        // 如果 SCOUT_DRIVER 为 null 则使用 sql 搜索
        if (Str::isNull(config('scout.driver'))) {
            return self::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id');
        }

        // 如果全文搜索出错则降级使用 sql like
        try {
            $id = self::search($wd);
        } catch (Exception $e) {
            $id = self::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id');
        }

        return $id;
    }

    /**
     * @return UrlGenerator|string
     *
     * @author hanmeimei
     */
    public function getUrlAttribute()
    {
        $parameters = [$this->id];

        if (Str::isTrue(config('bjyblog.seo.use_slug'))) {
            $parameters[] = $this->slug;
        }

        return url('article', $parameters);
    }

    public function visits()
    {
        return visits($this);
    }
}
