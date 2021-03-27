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
