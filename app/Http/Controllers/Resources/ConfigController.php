<?php

namespace App\Http\Controllers\Resources;

use Baijunyao\LaravelRestful\Traits\Index;
use Baijunyao\LaravelRestful\Traits\Show;
use Baijunyao\LaravelRestful\Traits\Update;

class ConfigController extends Controller
{
    use Index, Show, Update;
}
