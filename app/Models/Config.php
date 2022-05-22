<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Schemas\ConfigSchema;
use Str;

class Config extends ConfigSchema
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @param string $value
     *
     * @return array<mixed>|string
     */
    public function getValueAttribute($value)
    {
        if (Str::isJsonArray($value)) {
            return json_decode($value, true);
        }

        return $value;
    }

    /**
     * @param array<mixed>|string $value
     */
    public function setValueAttribute($value): void
    {
        $this->attributes['value'] = is_array($value) ? json_encode($value) : $value;
    }
}
