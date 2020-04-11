<?php

declare(strict_types=1);

namespace App\Http\Requests\Nav;

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
