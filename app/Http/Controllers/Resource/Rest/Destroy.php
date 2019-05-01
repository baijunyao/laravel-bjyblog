<?php

namespace App\Http\Controllers\Resource\Rest;

trait Destroy
{
    public function destroy()
    {
        $model = static::MODEL;
        $id = $this->getRouteId();

        return response()->json((new $model)->destroy($id));
    }
}
