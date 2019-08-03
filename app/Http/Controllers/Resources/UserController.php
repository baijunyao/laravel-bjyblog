<?php

namespace App\Http\Controllers\Resources;

use Baijunyao\LaravelRestful\Destroy;
use Baijunyao\LaravelRestful\ForceDelete;
use Baijunyao\LaravelRestful\Index;
use Baijunyao\LaravelRestful\Restore;
use Baijunyao\LaravelRestful\Show;
use Baijunyao\LaravelRestful\Update;

class UserController extends Controller
{
    use Index, Show, Update, Destroy, Restore, ForceDelete;
}
