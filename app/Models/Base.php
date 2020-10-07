<?php

declare(strict_types=1);

namespace App\Models;

use Artisan;
use Batch;
use DateTimeInterface;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Base
 *
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Base newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Base newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Base onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Base query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base withCacheCooldownSeconds($seconds = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Base withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Base withoutTrashed()
 * @mixin \Eloquent
 */
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
