<?php

namespace App\Http\Controllers\Resource\Rest;

trait Index
{
    public function index()
    {
        $model = $this->getModelObject();
        $relations = [];

        foreach (static::RELATIONS as $relation => $column) {
            $relations[$relation] = function ($query) use ($column) {
                $query->select($column);
            };
        }

        $list = $model->withTrashed()
            ->when(count(static::COLUMN) > 0, function ($query) {
                $query->select(static::COLUMN);
            })
            ->with($relations)
            ->paginate();

        return response()->json($list);
    }
}
