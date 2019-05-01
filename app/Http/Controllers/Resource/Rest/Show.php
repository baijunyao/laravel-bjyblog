<?php

namespace App\Http\Controllers\Resource\Rest;

trait Show
{
    public function show()
    {
        $model = $this->getModelObject();
        $id = $this->getRouteId();

        return response()->json($model->withTrashed()->find($id));
    }
}
