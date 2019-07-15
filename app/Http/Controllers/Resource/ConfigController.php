<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Resource\Rest\Index;
use App\Http\Controllers\Resource\Rest\Show;
use App\Http\Controllers\Resource\Rest\Update;
use App\Models\Config;

class ConfigController extends Controller
{
    use Index, Show, Update;

    protected const MODEL = Config::class;
}
