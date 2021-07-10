<?php

declare(strict_types=1);

namespace App\Models;

use Artisan;
use Batch;
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
     * @param array<int,array<string,mixed>> $multipleData
     *
     * e.g.
     * $multipleData = [
     *     [
     *         'id' => 1 ,
     *         'name' => 'baijunyao'
     *     ],
     *     [
     *         'id' => 2 ,
     *         'name' => 'Junyao Bai'
     *     ]
     * ]
     */
    public function updateBatch(array $multipleData = []): int
    {
        if (empty($multipleData)) {
            return 0;
        }

        $result = Batch::update(new static(), $multipleData, 'id');

        Artisan::call('modelCache:clear', [
            '--model' => static::class,
        ]);

        return intval($result);
    }

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
