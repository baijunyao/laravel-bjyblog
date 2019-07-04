<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected function getRouteId()
    {
        return current(request()->route()->parameters);
    }

    protected function getModelFQN()
    {
        $model = static::MODEL;

        if (empty($model)) {
            $model = 'App\\Models\\' . $this->getResourceName();
        }

        return $model;
    }

    protected function getResourceName()
    {
        return substr(trim(strrchr(static::class, '\\'),'\\'), 0, -10);
    }
}
