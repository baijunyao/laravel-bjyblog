<?php

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Rest\TestDestroy;
use Baijunyao\LaravelTestSupport\Rest\TestForceDelete;
use Baijunyao\LaravelTestSupport\Rest\TestIndex;
use Baijunyao\LaravelTestSupport\Rest\TestRestore;
use Baijunyao\LaravelTestSupport\Rest\TestShow;
use Baijunyao\LaravelTestSupport\Rest\TestStore;
use Baijunyao\LaravelTestSupport\Rest\TestStoreValidation;
use Baijunyao\LaravelTestSupport\Rest\TestUpdate;
use Baijunyao\LaravelTestSupport\Rest\TestUpdateValidation;

class SiteControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestStoreValidation, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $storeData = [
        'socialite_user_id' => 1,
        'name'              => 'Store',
        'description'       => 'Store',
        'url'               => 'https://test.test',
        'audit'             => 1,
        'sort'              => 1,
    ];
    protected $updateData = [
        'socialite_user_id' => 2,
        'name'              => 'Update',
        'description'       => 'Update',
        'url'               => 'https://update.test',
        'audit'             => 1,
        'sort'              => 2,
    ];
}
