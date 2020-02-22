<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use Tests\Feature\Admin\CURD\TestCreate;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;
use Tests\Feature\Admin\CURD\TestStore;
use Tests\Feature\Admin\CURD\TestUpdate;

class OpenSourceControllerTest extends TestCase
{
    use TestIndex, TestCreate, TestStore, TestEdit, TestUpdate, TestDestroy, TestRestore, TestForceDelete;
    protected $urlPrefix     = 'admin/openSource/';
    protected $table         = 'open_sources';
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
