<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Restful\TestDestroy;
use Baijunyao\LaravelTestSupport\Restful\TestForceDelete;
use Baijunyao\LaravelTestSupport\Restful\TestRestore;
use Baijunyao\LaravelTestSupport\Restful\TestStore;
use Baijunyao\LaravelTestSupport\Restful\TestStoreValidation;
use Baijunyao\LaravelTestSupport\Restful\TestUpdate;
use Baijunyao\LaravelTestSupport\Restful\TestUpdateValidation;

class TagControllerTest extends TestCase
{
    use TestStore, TestStoreValidation, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $destroyId     = 2;
    protected $restoreId     = 3;
    protected $forceDeleteId = 3;
    protected $storeData     = [
        'name' => 'Store',
    ];
    protected $updateData = [
        'name' => 'Update',
    ];
}
