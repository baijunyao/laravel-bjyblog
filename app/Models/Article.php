<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;

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
 * @property int    $click       点击数
 *
 * @author  hanmeimei
 */
class Article extends Base
{
    use Searchable;

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

    /**
     * 关联文章表
     *
     * @return belongsTo
     */
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
     * 给文章的插图添加水印;并取第一张图片作为封面图
     *
     * @param string $content markdown格式的文章内容
     * @param array  $except  忽略加水印的图片
     *
     * @return string
     */
    public function getCover(string $content, array $except = [])
    {
        // 获取文章中的全部图片
        preg_match_all('/!\[.*?\]\((\S*(?<=png|gif|jpg|jpeg)).*?\)/i', $content, $images);

        if (!empty($images[1])) {
            // 循环给图片添加水印
            foreach ($images[1] as $k => $v) {
                $image = explode(' ', $v);
                $file  = public_path() . $image[0];

                if (file_exists($file) && !in_array($v, $except)) {
                    add_text_water($file, config('bjyblog.water.text'));
                }

                // 取第一张图片作为封面图
                if ($k == 0) {
                    $cover = $image[0];
                }
            }
        }

        return $cover ?? 'uploads/article/default.jpg';
    }

    /**
     * 搜索文章获取文章id
     *
     * @param string $wd
     *
     * @return Collection
     */
    public function searchArticleGetId(string $wd)
    {
        // 如果 SCOUT_DRIVER 为 null 则使用 sql 搜索
        if (env('SCOUT_DRIVER') === null) {
            return self::where('title', 'like', "%$wd%")
                ->orWhere('description', 'like', "%$wd%")
                ->orWhere('markdown', 'like', "%$wd%")
                ->pluck('id');
        }

        // 如果全文搜索出错则降级使用 sql like
        try {
            $id = self::search($wd)->keys();
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

        if (config('bjyblog.seo.use_slug') === 'true') {
            $parameters[] = $this->slug;
        }

        return url('article', $parameters);
    }
}
