<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Resources\Rest\Destroy;
use App\Http\Controllers\Resources\Rest\ForceDelete;
use App\Http\Controllers\Resources\Rest\Index;
use App\Http\Controllers\Resources\Rest\Restore;
use App\Http\Controllers\Resources\Rest\Show;
use App\Http\Controllers\Resources\Rest\Store;
use App\Http\Controllers\Resources\Rest\Update;
use App\Models\Category;

class CategoryController extends Controller
{
    use Index, Show, Store, Update, Destroy, Restore, ForceDelete;

    protected const MODEL = Category::class;
}
