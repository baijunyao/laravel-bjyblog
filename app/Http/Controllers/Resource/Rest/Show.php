<?php

namespace App\Http\Controllers\Resource\Rest;

trait Show
{
    public function show()
    {
        $model = static::MODEL;
        $id = $this->getRouteId();

        return response()->json((new $model)->find($id));
    }
}
