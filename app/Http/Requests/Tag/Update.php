<?php

declare(strict_types=1);

namespace App\Http\Requests\Tag;

class Update extends Store
{
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
