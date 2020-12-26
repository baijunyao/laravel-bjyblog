<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kalnoy\Nestedset\NodeTrait;
use Str;

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
 *
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
 */
class Comment extends Base
{
    use NodeTrait;

    public function getContentAttribute(string $value): string
    {
        return $this->ubbToImage($value);
    }

    public function setContentAttribute(string $value): void
    {
        $this->attributes['content'] = $this->imageToUbb($value);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class)->withDefault();
    }

    public function socialiteUser(): BelongsTo
    {
        return $this->belongsTo(SocialiteUser::class)->withDefault();
    }

    public function parentComment(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->withDefault();
    }

    public function ubbToImage(string $content): string
    {
        $ubb   = ['[Kiss]', '[Love]', '[Yeah]', '[啊！]', '[背扭]', '[顶]', '[抖胸]', '[88]', '[汗]', '[瞌睡]', '[鲁拉]', '[拍砖]', '[揉脸]', '[生日快乐]', '[摊手]', '[睡觉]', '[瘫坐]', '[无聊]', '[星星闪]', '[旋转]', '[也不行]', '[郁闷]', '[正Music]', '[抓墙]', '[撞墙至死]', '[歪头]', '[戳眼]', '[飘过]', '[互相拍砖]', '[砍死你]', '[扔桌子]', '[少林寺]', '[什么？]', '[转头]', '[我爱牛奶]', '[我踢]', '[摇晃]', '[晕厥]', '[在笼子里]', '[震荡]'];
        $count = count($ubb);
        $image = [];

        // 循环生成img标签
        for ($i = 1; $i <= $count; $i++) {
            $image[] = '<img src="' . asset('statics/emote/tuzki/' . $i . '.gif') . '" title="' . str_replace(['[', ']'], '', $ubb[$i - 1]) . '" alt="' . config('app.name') . '">';
        }

        return str_replace($ubb, $image, $content);
    }

    public function imageToUbb(string $content): string
    {
        $content = html_entity_decode(htmlspecialchars_decode($content));
        // 删标签 去空格 转义
        $content = strip_tags(trim($content), '<img>');
        preg_match_all('/<img.*?title="(.*?)".*?>/i', $content, $img);
        $search  = $img[0];
        $replace = array_map(function ($v) {
            return '[' . $v . ']';
        }, $img[1]);
        $content = str_replace($search, $replace, $content);

        return clean(strip_tags($content));
    }

    /**
     * @return \Kalnoy\Nestedset\Collection<\App\Models\Comment>
     */
    public function getLatestComments(int $number)
    {
        return $this->with(['article', 'socialiteUser', 'socialiteUser.socialiteClient'])
            ->when(Str::isTrue(config('bjyblog.comment_audit')), function ($query) {
                return $query->where('is_audited', 1);
            })
            ->whereHas('socialiteUser', function ($query) {
                $query->where('is_admin', 0);
            })
            ->has('article')
            ->orderBy('created_at', 'desc')
            ->limit($number)
            ->get()
            ->each(function ($comment) {
                $comment->sub_content = strip_tags($comment->content);

                if (mb_strlen($comment->sub_content) > 10) {
                    if (config('app.locale') === 'zh-CN') {
                        $comment->sub_content = Str::substr($comment->sub_content, 0, 40);
                    } else {
                        $comment->sub_content = Str::words($comment->sub_content, 10, '');
                    }
                }

                if (config('app.locale') === 'zh-CN') {
                    $comment->article->sub_title = Str::substr($comment->article->title, 0, 20);
                } else {
                    $comment->article->sub_title = Str::words($comment->article->title, 5, '');
                }

                return $comment;
            });
    }
}
