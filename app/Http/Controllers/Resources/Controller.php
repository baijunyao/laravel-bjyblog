<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resources;

use Baijunyao\LaravelRestful\RestfulController;
use Spatie\QueryBuilder\AllowedFilter;

class Controller extends RestfulController
{
    protected const SORTS = [
        'id',
        'created_at',
    ];

    /**
     * @return array<int,mixed>
     */
    protected function getFilters(): array
    {
        $filters = parent::getFilters();

        $filters[] = AllowedFilter::trashed();

        return $filters;
    }
}
