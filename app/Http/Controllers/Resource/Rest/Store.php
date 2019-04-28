<?php

namespace App\Http\Controllers\Resource\Rest;

trait Store
{
    public function store()
    {
        $model = static::MODEL;

        return response()->json((new $model)->create(request()->all()));
    }
}
