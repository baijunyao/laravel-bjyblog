<?php

namespace App\Http\Controllers\Resource\Rest;

trait Index
{
    public function index()
    {
        $model = static::MODEL;

        $relations = [];
        foreach (static::RELATIONS as $relation => $column) {
            $relations[$relation] = function ($query) use ($column) {
                $query->select($column);
            };
        }

        $list = (new $model)->select(static::COLUMN)
            ->with($relations)
            ->withTrashed()
            ->paginate();

        return response()->json($list);
    }
}
