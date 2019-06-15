<?php

namespace App\Http\Controllers\Resource\Rest;

trait Show
{
    public function show()
    {
        $model = $this->getModelObject();
        $id = $this->getRouteId();
        $relations = [];

        foreach (static::RELATIONS as $relation => $column) {
            $relations[$relation] = function ($query) use ($column) {
                $query->select($column);
            };
        }

        return response()->json($model->withTrashed()->with($relations)->find($id));
    }
}
