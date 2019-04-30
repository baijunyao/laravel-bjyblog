<?php

namespace App\Http\Controllers\Resource\Rest;

trait Show
{
    public function show()
    {
        $model = static::MODEL;
        $id = current(request()->route()->parameters);

        return response()->json((new $model)->find($id));
    }
}
