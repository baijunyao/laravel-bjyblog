<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\CommentSchema
 *
 * @property int                             $id
 * @property int                             $socialite_user_id
 * @property int                             $article_id
 * @property string                          $content
 * @property int                             $is_audited
 * @property int                             $_lft
 * @property int                             $_rgt
 * @property int|null                        $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Article|null $article
 * @property-read \Kalnoy\Nestedset\Collection|Comment[] $children
 * @property-read Comment|null $parent
 * @property-read Comment|null $parentComment
 * @property-read \App\Models\SocialiteUser|null $socialiteUser
 *
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 *
 * @mixin \Eloquent
 */
abstract class CommentSchema extends BaseSchema
{
}
