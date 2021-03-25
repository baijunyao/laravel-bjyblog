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

class NavControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestStoreValidation, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $restoreId     = 3;
    protected $forceDeleteId = 3;
    protected $storeData     = [
        'name' => '测试',
        'url'  => 'test',
    ];
    protected $updateData = [
        'name' => '编辑',
        'url'  => 'update',
    ];
}
