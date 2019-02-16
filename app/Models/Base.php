<?php

namespace App\Models;

use Baijunyao\LaravelModel\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends BaseModel
{
    // 软删除
    use SoftDeletes;
}
