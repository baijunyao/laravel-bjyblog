<?php

namespace App\Http\Controllers\Resource\Rest;

trait Restore
{
    public function restore()
    {
        $model = static::getModelObject();
        $id = $this->getRouteId();
        $model->onlyTrashed()->find($id)->restore();

        return response('');
    }
}
