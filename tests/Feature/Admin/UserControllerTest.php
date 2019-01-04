<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;

class UserControllerTest extends TestCase
{
    use TestIndex, TestEdit, TestDestroy, TestRestore, TestForceDelete;

    protected $urlPrefix = 'admin/user/';

    protected $updateData = [
        'name' => 'example',
        'email' => 'user@example.com',
        'password' => '666666'
    ];
}
