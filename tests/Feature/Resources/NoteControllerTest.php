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

class NoteControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestStoreValidation, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $storeData = [
        'content' => 'Store',
    ];
    protected $updateData = [
        'content' => 'Update',
    ];
}
