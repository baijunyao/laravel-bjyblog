<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Requests\Tag\Store as StoreRequest;
use Illuminate\Routing\Redirector;

class Controller extends BaseController
{
    protected function getRouteId()
    {
        return current(request()->route()->parameters);
    }

    protected function getResourceName()
    {
        return substr(trim(strrchr(static::class, '\\'),'\\'), 0, -10);
    }

    protected function getModelFQN()
    {
        $model = static::MODEL;

        if (empty($model)) {
            $model = '\\App\\Models\\' . $this->getResourceName();
        }

        return $model;
    }

    protected function getResourceFQN()
    {
        $resource  = '\\App\\Http\\Resources\\' . $this->getResourceName();

        return $resource;
    }

    protected function formRequestValidation()
    {
        $app = app();
        $request = StoreRequest::createFrom($app['request']);
        $request->setContainer($app)->setRedirector($app->make(Redirector::class));
        $request->validateResolved();
    }
}
