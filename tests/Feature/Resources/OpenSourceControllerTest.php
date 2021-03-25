<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Restful\TestDestroy;
use Baijunyao\LaravelTestSupport\Restful\TestForceDelete;
use Baijunyao\LaravelTestSupport\Restful\TestIndex;
use Baijunyao\LaravelTestSupport\Restful\TestRestore;
use Baijunyao\LaravelTestSupport\Restful\TestShow;
use Baijunyao\LaravelTestSupport\Restful\TestStore;
use Baijunyao\LaravelTestSupport\Restful\TestStoreValidation;
use Baijunyao\LaravelTestSupport\Restful\TestUpdate;
use Baijunyao\LaravelTestSupport\Restful\TestUpdateValidation;

class OpenSourceControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestStoreValidation, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $restoreId     = 9;
    protected $forceDeleteId = 9;
    protected $storeData     = [
        'sort' => 10,
        'type' => 1,
        'name' => 'store/store',
    ];
    protected $updateData = [
        'sort' => 11,
        'type' => 2,
        'name' => 'update/update',
    ];
}
