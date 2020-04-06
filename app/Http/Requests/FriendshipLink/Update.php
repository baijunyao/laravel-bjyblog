<?php

declare(strict_types=1);

namespace App\Http\Requests\FriendshipLink;

class Update extends Store
{
    public function rules()
    {
        return [
            'name' => 'required',
            'url'  => 'required',
        ];
    }
}
