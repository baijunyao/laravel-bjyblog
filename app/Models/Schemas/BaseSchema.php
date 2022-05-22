<?php

declare(strict_types=1);

namespace App\Models\Schemas;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseSchema extends Model
{
    use SoftDeletes;

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
