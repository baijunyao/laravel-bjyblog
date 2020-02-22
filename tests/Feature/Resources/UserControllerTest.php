<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Rest\TestDestroy;
use Baijunyao\LaravelTestSupport\Rest\TestForceDelete;
use Baijunyao\LaravelTestSupport\Rest\TestIndex;
use Baijunyao\LaravelTestSupport\Rest\TestRestore;
use Baijunyao\LaravelTestSupport\Rest\TestShow;
use Baijunyao\LaravelTestSupport\Rest\TestUpdate;
use Baijunyao\LaravelTestSupport\Rest\TestUpdateValidation;

class UserControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $updateData = [
        'name'     => 'update',
        'email'    => 'update@example.com',
        'password' => 'abc123',
    ];
}
