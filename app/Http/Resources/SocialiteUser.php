<?php

declare(strict_types=1);

namespace App\Http\Resources;

/**
 * @mixin \App\Models\SocialiteUser
 */
class SocialiteUser extends Base
{
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'email'            => $this->email,
            'avatar'           => $this->avatar,
            'is_admin'         => $this->is_admin,
            'is_blocked'       => $this->is_blocked,
            'socialite_client' => [
                'id'   => $this->socialiteClient->id,
                'name' => $this->socialiteClient->name,
                'icon' => $this->socialiteClient->icon,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
