<?php

namespace App\Http\Controllers\Resources\Rest;

trait ForceDelete
{
    public function forceDelete()
    {
        $model = static::getModelFQN();
        $id = $this->getRouteId();
        (new $model)->withTrashed()->find($id)->forceDelete();

        return response('');
    }
}
