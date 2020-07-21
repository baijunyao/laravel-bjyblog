<?php

declare(strict_types=1);

namespace App\Models;

use Artisan;
use DateTimeInterface;
use DB;
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
class Base extends Model
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

        $tableName       = config('database.connections.mysql.prefix') . $this->getTable();
        $updateColumn    = array_keys($multipleData[0]);
        $referenceColumn = $updateColumn[0];

        unset($updateColumn[0]);

        $whereIn = '';
        $sql     = 'UPDATE ' . $tableName . ' SET ';

        foreach ($updateColumn as $uColumn) {
            $sql .= $uColumn . ' = CASE ';

            foreach ($multipleData as $data) {
                $sql .= 'WHEN ' . $referenceColumn . " = '" . $data[$referenceColumn] . "' THEN '" . $data[$uColumn] . "' ";
            }

            $sql .= 'ELSE ' . $uColumn . ' END, ';
        }

        foreach ($multipleData as $data) {
            $whereIn .= "'" . $data[$referenceColumn] . "', ";
        }

        $sql = rtrim($sql, ', ') . ' WHERE ' . $referenceColumn . ' IN (' . rtrim($whereIn, ', ') . ')';

        $result = DB::update($sql);

        Artisan::call('modelCache:clear', [
            '--model' => static::class,
        ]);

        return $result;
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
