<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;
use Hash;

class UserControllerTest extends TestCase
{
    use TestIndex, TestEdit, TestDestroy, TestRestore, TestForceDelete;

    protected $urlPrefix = 'admin/user/';
    protected $table = 'users';

    public function testUpdate()
    {
        $user = [
            'name' => 'update',
            'email' => 'update@example.com',
        ];
        $password = 'abc123';

        $this->adminPost('update/' . $this->updateId, $user + ['password' => $password])->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '修改成功',
                    'alert-type' => 'success'
                ]
            ]
        ]);

        $this->assertDatabaseHas($this->table, $user);

        $this->assertTrue(Hash::check($password, User::find($this->updateId)->password));
    }

    public function testUpdatePasswordIsEmpty()
    {
        $user = [
            'name' => 'update',
            'email' => 'update@example.com',
            'password' => ''
        ];
        $this->adminPost('update/' . $this->updateId, $user)->assertSessionHasAll([
            'laravel-flash' => [
                [
                    'alert-message' => '修改成功',
                    'alert-type' => 'success'
                ]
            ]
        ]);

        $this->assertTrue(Hash::check('123456', User::find($this->updateId)->password));
    }
}
