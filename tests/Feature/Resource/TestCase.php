<?php

namespace Tests\Feature\Resource;

use App\Models\User;

abstract class TestCase extends \Tests\Feature\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::find(static::ADMIN_USER_ID), 'api');
    }
}
