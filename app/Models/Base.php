<?php

declare(strict_types=1);

namespace App\Models;

use DateTimeInterface;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Base extends Model
{
    use SoftDeletes, Cachable;

    /**
     * @var array<int,string>
     */
    protected $guarded = [];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
