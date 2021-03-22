<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Restful\TestDestroy;
use Baijunyao\LaravelTestSupport\Restful\TestForceDelete;
use Baijunyao\LaravelTestSupport\Restful\TestIndex;
use Baijunyao\LaravelTestSupport\Restful\TestRestore;
use Baijunyao\LaravelTestSupport\Restful\TestShow;
use Baijunyao\LaravelTestSupport\Restful\TestUpdate;
use Baijunyao\LaravelTestSupport\Restful\TestUpdateValidation;

class UserControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $updateData = [
        'name'     => 'update',
        'email'    => 'update@example.com',
        'password' => 'abc123',
    ];
}
