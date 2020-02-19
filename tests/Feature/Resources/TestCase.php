<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use App\Models\User;

abstract class TestCase extends \Tests\Feature\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::find(static::ADMIN_USER_ID), 'api');
    }
}
