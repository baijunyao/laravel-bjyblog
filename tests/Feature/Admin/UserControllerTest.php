<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Hash;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;

class UserControllerTest extends TestCase
{
    use TestIndex, TestEdit, TestDestroy, TestRestore, TestForceDelete;

    protected $urlPrefix = 'admin/user/';
    protected $table     = 'users';

    public function testUpdate()
    {
        $user = [
            'name'  => 'update',
            'email' => 'update@example.com',
        ];
        $password = 'abc123';

        $this->adminPost('update/' . $this->updateId, $user + ['password' => $password])
            ->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        $this->assertDatabaseHas($this->table, $user);

        static::assertTrue(Hash::check($password, User::find($this->updateId)->password));
    }

    public function testUpdatePasswordIsEmpty()
    {
        $user = [
            'name'     => 'update',
            'email'    => 'update@example.com',
            'password' => '',
        ];
        $this->adminPost('update/' . $this->updateId, $user)
            ->assertSessionHasAll(static::UPDATE_SUCCESS_MESSAGE);

        static::assertTrue(Hash::check('123456', User::find($this->updateId)->password));
    }
}
