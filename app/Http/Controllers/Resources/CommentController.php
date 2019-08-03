<?php

namespace App\Http\Controllers\Resources;

use Baijunyao\LaravelRestful\Destroy;
use Baijunyao\LaravelRestful\ForceDelete;
use Baijunyao\LaravelRestful\Index;
use Baijunyao\LaravelRestful\Restore;
use Baijunyao\LaravelRestful\Show;

class CommentController extends Controller
{
    use Index, Show, Destroy, Restore, ForceDelete;
}
