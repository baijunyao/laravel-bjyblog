<?php

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Rest\TestDestroy;
use Baijunyao\LaravelTestSupport\Rest\TestForceDelete;
use Baijunyao\LaravelTestSupport\Rest\TestIndex;
use Baijunyao\LaravelTestSupport\Rest\TestRestore;
use Baijunyao\LaravelTestSupport\Rest\TestShow;
use Baijunyao\LaravelTestSupport\Rest\TestStore;
use Baijunyao\LaravelTestSupport\Rest\TestUpdate;

class CategoryControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestUpdate, TestDestroy, TestRestore, TestForceDelete;

    protected $storeData     = [
        'name'        => 'Store',
        'slug'        => 'store',
        'keywords'    => 'keywords',
        'description' => 'description',
        'sort'        => 2,
        'pid'         => 1,
    ];
    protected $updateData = [
        'name' => 'Updated Name',
    ];
}
