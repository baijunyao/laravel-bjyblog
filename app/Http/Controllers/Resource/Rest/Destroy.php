<?php

namespace App\Http\Controllers\Resource\Rest;

trait Destroy
{
    public function destroy()
    {
        $model = static::getModelObject();
        $id = $this->getRouteId();
        $model->destroy($id);

        return response('');
    }
}
