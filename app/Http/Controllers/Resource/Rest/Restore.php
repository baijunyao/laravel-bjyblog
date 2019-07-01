<?php

namespace App\Http\Controllers\Resource\Rest;

trait Restore
{
    public function restore()
    {
        $relations = [];
        foreach (static::RELATIONS as $relation => $column) {
            $relations[$relation] = function ($query) use ($column) {
                $query->select($column);
            };
        }

        $model = static::getModelObject()->onlyTrashed()->with($relations)->find($this->getRouteId());
        $model->restore();

        return response($model);
    }
}
