<?php

namespace App\Http\Controllers\Resource\Rest;

trait Update
{
    public function update()
    {
        $model = $this->getModelObject();
        $currentModel = $model->withTrashed()->find($this->getRouteId());
        $model->update(request()->all());

        return response()->json($currentModel);
    }
}
