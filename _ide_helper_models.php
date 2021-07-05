<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Article
 *
 * @property int                             $id          文章表主键
 * @property int                             $category_id 分类id
 * @property string                          $title       标题
 * @property string                          $slug        slug
 * @property string                          $author      作者
 * @property string                          $markdown    markdown文章内容
 * @property string                          $html        markdown转的html页面
 * @property string                          $description 描述
 * @property string                          $keywords    关键词
 * @property string                          $cover       封面图
 * @property int                             $is_top      是否置顶 1是 0否
 * @property int                             $views       点击数
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ArticleHistory[] $article_histories
 * @property-read int|null $article_histories_count
 * @property-read \App\Models\Category $category
 * @property-read mixed $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SocialiteUser[] $likers
 * @property-read int|null $likers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Article newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Article newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereMarkdown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ArticleHistory[] $articleHistories
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Article truncate()
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ArticleHistory
 *
 * @property int                             $id
 * @property int                             $article_id
 * @property string                          $markdown
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Article $article
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleHistory newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereMarkdown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleHistory truncate()
 */
	class ArticleHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ArticleTag
 *
 * @property int                             $article_id 文章id
 * @property int                             $tag_id     标签id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleTag newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleTag newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\ArticleTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ArticleTag truncate()
 */
	class ArticleTag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Category
 *
 * @property int                             $id          自增ID
 * @property string                          $name        分类名称
 * @property string                          $slug        slug
 * @property string                          $keywords    关键词
 * @property string                          $description 描述
 * @property int                             $sort        排序
 * @property int                             $pid         排序
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read mixed $url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Category newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Category newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category truncate()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Comment
 *
 * @property int                             $id                主键id
 * @property int                             $socialite_user_id 评论用户id
 * @property bool                            $type              1：文章评论
 * @property int                             $_lft
 * @property int                             $_rgt
 * @property int|null                        $parent_id
 * @property int                             $article_id        文章id
 * @property string                          $content           内容
 * @property int                             $is_audited        是否已审核
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Article $article
 * @property-read \App\Models\SocialiteUser $socialiteUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Comment newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Comment newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereIsAudited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereSocialiteUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @property-read \Kalnoy\Nestedset\Collection|Comment[] $children
 * @property-read int|null $children_count
 * @property-read Comment|null $parent
 * @property-read Comment|null $parentComment
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment withoutRoot()
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Config
 *
 * @property int                             $id         主键
 * @property string                          $name       配置项键名
 * @property string                          $value      配置项键值 1表示开启 0 关闭
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Config newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Config newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Config truncate()
 */
	class Config extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Console
 *
 * @property int                             $id         主键
 * @property string                          $name       名称
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Console newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Console newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Console query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Console truncate()
 */
	class Console extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Friend
 *
 * @property int                             $id         主键ID
 * @property string                          $name       链接名
 * @property string                          $url        链接地址
 * @property int                             $sort       排序
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Friend newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Friend newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Friend query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Friend whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Friend truncate()
 */
	class Friend extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Nav
 *
 * @property int                             $id         菜单主键
 * @property int                             $sort       排序
 * @property string                          $name       菜单名
 * @property string                          $url        链接
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Nav newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Nav newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Nav query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Nav truncate()
 */
	class Nav extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Note
 *
 * @property int                             $id         主键id
 * @property string                          $content    内容
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Note newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Note newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note truncate()
 */
	class Note extends \Eloquent {}
}

namespace App\Models{
/**
 * Class OpenSource
 *
 * @property int                             $id         项目主键
 * @property int                             $sort       排序
 * @property int                             $type       1:github 2:gitee
 * @property string                          $name       项目名
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\OpenSource newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\OpenSource newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\OpenSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OpenSource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|OpenSource truncate()
 */
	class OpenSource extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Site
 *
 * @property int                             $id                主键
 * @property int                             $socialite_user_id 第三方用户id
 * @property string                          $name              网站名
 * @property string                          $description       描述
 * @property string                          $url               网站链接
 * @property int                             $audit             审核状态1为通过审核
 * @property int                             $sort              排序
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\SocialiteUser $socialiteUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Site newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Site newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Site query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereAudit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereSocialiteUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Site truncate()
 */
	class Site extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SocialiteClient
 *
 * @property int                             $id            主键
 * @property string                          $name          名称
 * @property string                          $icon          icon
 * @property string                          $client_id     客户端ID
 * @property string                          $client_secret 客户端密钥
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\SocialiteClient newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\SocialiteClient newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\SocialiteClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereClientSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SocialiteClient truncate()
 */
	class SocialiteClient extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SocialiteUser
 *
 * @property int                             $id                  主键id
 * @property int                             $socialite_client_id 类型 1：QQ  2：新浪微博 3：github
 * @property string                          $name                第三方昵称
 * @property string                          $avatar              头像
 * @property string                          $openid              第三方用户id
 * @property string                          $access_token        access_token token
 * @property string                          $last_login_ip       最后登录ip
 * @property int                             $login_times         登录次数
 * @property string                          $email               邮箱
 * @property int                             $is_admin            是否是admin
 * @property int                             $is_blocked
 * @property string                          $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\SocialiteClient $socialiteClient
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereLoginTimes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereSocialiteClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialiteUser whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereIsBlocked($value)
 */
	class SocialiteUser extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tag
 *
 * @property int                             $id          标签主键
 * @property string                          $name        标签名
 * @property string                          $slug        slug
 * @property string                          $keywords    标签关键词
 * @property string                          $description 标签描述主要是 SEO
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read \UrlGenerator|string $url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Tag newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Tag newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tag truncate()
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @property int                             $id                主键ID
 * @property string                          $name              昵称
 * @property string                          $email             邮箱
 * @property int                             $email_verified_at 邮箱验证时间
 * @property string                          $password          密码
 * @property string                          $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserBase
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserBase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserBase newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserBase onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserBase query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserBase withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserBase withoutTrashed()
 * @mixin \Eloquent
 */
	class UserBase extends \Eloquent implements \Illuminate\Contracts\Auth\Authenticatable, \Illuminate\Contracts\Auth\Access\Authorizable {}
}

