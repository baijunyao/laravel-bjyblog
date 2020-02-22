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

class SocialiteUserControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected $updateData = [
        'socialite_client_id'          => 2,
        'name'                         => '编辑',
        'avatar'                       => '/uploads/article/default.jpg',
        'openid'                       => '',
        'access_token'                 => '',
        'last_login_ip'                => '127.0.0.1',
        'login_times'                  => 2,
        'email'                        => 'update@baijunyao.com',
        'is_admin'                     => 1,
    ];
}
