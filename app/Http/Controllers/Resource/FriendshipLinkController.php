<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Resource\Rest\Destroy;
use App\Http\Controllers\Resource\Rest\ForceDelete;
use App\Http\Controllers\Resource\Rest\Index;
use App\Http\Controllers\Resource\Rest\Restore;
use App\Http\Controllers\Resource\Rest\Show;
use App\Http\Controllers\Resource\Rest\Store;
use App\Http\Controllers\Resource\Rest\Update;
use App\Models\FriendshipLink;
use App\Models\Tag;

class FriendshipLinkController extends Controller
{
    use Index, Show, Store, Update, Destroy, Restore, ForceDelete;

    protected const MODEL = FriendshipLink::class;
}
