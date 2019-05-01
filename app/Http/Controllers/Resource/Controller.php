<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected function getRouteId()
    {
        return current(request()->route()->parameters);
    }
}
