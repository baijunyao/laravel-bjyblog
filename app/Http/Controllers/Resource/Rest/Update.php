<?php

namespace App\Http\Controllers\Resource\Rest;

trait Update
{
    public function update()
    {
        $model = static::MODEL;
        $id = $this->getRouteId();

        return response()->json((new $model)->find($id)->update(request()->all()));
    }
}
