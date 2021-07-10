<?php

declare(strict_types=1);

namespace App\Models;

use Str;

class Config extends Base
{
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
