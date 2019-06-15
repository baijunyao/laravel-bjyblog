<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected const MODEL = null;
    protected const COLUMN = [];
    protected const RELATIONS = [];

    protected function getRouteId()
    {
        return current(request()->route()->parameters);
    }

    protected function getModelObject()
    {
        $model = static::MODEL;

        return new $model;
    }
}
