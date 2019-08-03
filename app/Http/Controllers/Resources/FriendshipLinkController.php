<?php

namespace App\Http\Controllers\Resources;

use Baijunyao\LaravelRestful\Destroy;
use Baijunyao\LaravelRestful\ForceDelete;
use Baijunyao\LaravelRestful\Index;
use Baijunyao\LaravelRestful\Restore;
use Baijunyao\LaravelRestful\Show;
use Baijunyao\LaravelRestful\Store;
use Baijunyao\LaravelRestful\Update;

class FriendshipLinkController extends Controller
{
    use Index, Show, Store, Update, Destroy, Restore, ForceDelete;
}
