<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Baijunyao\LaravelModel\Models\BaseModel;

class Base extends BaseModel
{
    // 软删除
    use SoftDeletes;
}
