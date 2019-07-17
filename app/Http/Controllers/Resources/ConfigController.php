<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Resources\Rest\Index;
use App\Http\Controllers\Resources\Rest\Show;
use App\Http\Controllers\Resources\Rest\Update;
use App\Models\Config;

class ConfigController extends Controller
{
    use Index, Show, Update;

    protected const MODEL = Config::class;
}
