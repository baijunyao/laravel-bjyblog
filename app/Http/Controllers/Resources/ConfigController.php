<?php

namespace App\Http\Controllers\Resources;

use Baijunyao\LaravelRestful\Index;
use Baijunyao\LaravelRestful\Show;
use Baijunyao\LaravelRestful\Update;
use App\Models\Config;

class ConfigController extends Controller
{
    use Index, Show, Update;
}
