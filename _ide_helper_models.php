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
     * App\Models\FriendshipLink
     *
     * @property int                             $id         主键id
     * @property string                          $name       链接名
     * @property string                          $url        链接地址
     * @property int|null                        $sort       排序
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-write mixed $first_name
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereSort($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendshipLink whereUrl($value)
     */
    class FriendshipLink extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\User
     *
     * @property int                             $id
     * @property string                          $name
     * @property string                          $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string                          $password
     * @property string|null                     $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Config
     *
     * @property int                             $id         主键
     * @property string                          $name       配置项键名
     * @property mixed                           $value      配置项键值 1表示开启 0 关闭
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config whereValue($value)
     */
    class Config extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Article
     *
     * @property int                             $id          文章表主键
     * @property int                             $category_id 分类id
     * @property string                          $title       标题
     * @property string                          $author      作者
     * @property string                          $markdown    markdown文章内容
     * @property string                          $html        markdown转的html页面
     * @property string                          $description 描述
     * @property string                          $keywords    关键词
     * @property string                          $cover       封面图
     * @property int                             $is_top      是否置顶 1是 0否
     * @property int                             $click       点击数
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \App\Models\Category $category
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereAuthor($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereClick($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCover($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereHtml($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereIsTop($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereKeywords($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereMarkdown($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
     */
    class Article extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Nav
     *
     * @property int                             $id         菜单主键
     * @property int                             $sort       排序
     * @property string                          $name       菜单名
     * @property string                          $url        链接
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereSort($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Nav whereUrl($value)
     */
    class Nav extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Console
     *
     * @property int                             $id
     * @property string                          $name       名称
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console whereUpdatedAt($value)
     */
    class Console extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Tag
     *
     * @property int                             $id         标签主键
     * @property string                          $name       标签名
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
     */
    class Tag extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Category
     *
     * @property int                             $id          分类主键id
     * @property string                          $name        分类名称
     * @property string                          $keywords    关键词
     * @property string                          $description 描述
     * @property int                             $sort        排序
     * @property int                             $pid         父级栏目id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereKeywords($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category wherePid($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSort($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
     */
    class Category extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\GitProject
     *
     * @property int                             $id         项目主键
     * @property int                             $sort       排序
     * @property int                             $type       1:github 2:gitee
     * @property string                          $name       项目名
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject whereSort($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GitProject whereUpdatedAt($value)
     */
    class GitProject extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * 评论
     *
     * @property int                             $id            主键id
     * @property int                             $oauth_user_id 评论用户id 关联oauth_user表的id
     * @property int                             $type          1：文章评论
     * @property int                             $pid           父级id
     * @property int                             $article_id    文章id
     * @property mixed                           $content       内容
     * @property int                             $status        1:已审核 0：未审核
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \App\Models\Article $article
     * @property-read \App\Models\OauthUser $oauthUser
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereArticleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereOauthUserId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment wherePid($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereStatus($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
     */
    class Comment extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\ArticleTag
     *
     * @property int                             $article_id 文章id
     * @property int                             $tag_id     标签id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereArticleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereTagId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereUpdatedAt($value)
     */
    class ArticleTag extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Site
     *
     * @property int                             $id
     * @property int                             $oauth_user_id 第三方用户id
     * @property string                          $name          网站名
     * @property string                          $description   描述
     * @property string                          $url           网站链接
     * @property int                             $audit         审核状态1为通过审核
     * @property int                             $sort          排序
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \App\Models\OauthUser $oauthUser
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereAudit($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereOauthUserId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereSort($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUrl($value)
     */
    class Site extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\OauthUser
     *
     * @property int                             $id             主键id
     * @property int                             $type           类型 1：QQ  2：新浪微博 3：github
     * @property string                          $name           第三方昵称
     * @property string                          $avatar         头像
     * @property string                          $openid         第三方用户id
     * @property string                          $access_token   access_token token
     * @property string                          $last_login_ip  最后登录ip
     * @property int                             $login_times    登录次数
     * @property string                          $email          邮箱
     * @property int                             $is_admin       是否是admin
     * @property string|null                     $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereAccessToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereAvatar($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereIsAdmin($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereLastLoginIp($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereLoginTimes($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereOpenid($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthUser whereUpdatedAt($value)
     */
    class OauthUser extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Chat
     *
     * @property int                             $id         主键id
     * @property string                          $content    内容
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     *
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chat newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chat newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chat query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chat whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chat whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chat whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chat whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chat whereUpdatedAt($value)
     */
    class Chat extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\Base
     *
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base newQuery()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Base onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base query()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\Baijunyao\LaravelModel\Models\BaseModel whereMap($map)
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Base withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Models\Base withoutTrashed()
     */
    class Base extends \Eloquent
    {
    }
}
