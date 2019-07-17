<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Resources\Rest\Destroy;
use App\Http\Controllers\Resources\Rest\ForceDelete;
use App\Http\Controllers\Resources\Rest\Index;
use App\Http\Controllers\Resources\Rest\Restore;
use App\Http\Controllers\Resources\Rest\Show;
use App\Models\Comment;

class CommentController extends Controller
{
    use Index, Show, Destroy, Restore, ForceDelete;

    protected const MODEL = Comment::class;
}
