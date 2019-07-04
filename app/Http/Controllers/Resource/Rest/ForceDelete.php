<?php

namespace App\Http\Controllers\Resource\Rest;

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
