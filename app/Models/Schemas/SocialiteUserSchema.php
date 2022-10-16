<?php

declare(strict_types=1);

namespace App\Models\Schemas;

/**
 * \App\Models\Schemas\SocialiteUserSchema
 *
 * @property int                             $id
 * @property int                             $socialite_client_id
 * @property string                          $name
 * @property string                          $avatar
 * @property string                          $openid
 * @property string                          $access_token
 * @property string                          $last_login_ip
 * @property int                             $login_times
 * @property string                          $email
 * @property int                             $is_admin
 * @property int                             $is_blocked
 * @property string|null                     $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\SocialiteClient|null $socialiteClient
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 *
 * @mixin \Eloquent
 */
abstract class SocialiteUserSchema extends UserBaseSchema
{
}
