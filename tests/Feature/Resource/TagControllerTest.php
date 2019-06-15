<?php

namespace Tests\Feature\Resource;

use Baijunyao\LaravelTestSupport\Rest\TestDestroy;
use Baijunyao\LaravelTestSupport\Rest\TestForceDelete;
use Baijunyao\LaravelTestSupport\Rest\TestIndex;
use Baijunyao\LaravelTestSupport\Rest\TestRestore;
use Baijunyao\LaravelTestSupport\Rest\TestShow;
use Baijunyao\LaravelTestSupport\Rest\TestUpdate;

class TagControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate, TestDestroy, TestRestore, TestForceDelete;

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
