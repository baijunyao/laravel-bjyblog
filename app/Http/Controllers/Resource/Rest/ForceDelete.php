<?php

namespace App\Http\Controllers\Resource\Rest;

trait ForceDelete
{
    public function forceDelete()
    {
        $model = static::getModelObject();
        $id = $this->getRouteId();
        $model->onlyTrashed()->find($id)->forceDelete();

        return response('');
    }
}
