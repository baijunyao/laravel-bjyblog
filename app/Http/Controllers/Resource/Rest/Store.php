<?php

namespace App\Http\Controllers\Resource\Rest;

trait Store
{
    public function store()
    {
        $model = $this->getModelObject();

        return response()->json($model->create(request()->all()));
    }
}
