<?php

namespace Tests\Feature\Admin;

use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestUpdate;

class OauthUserControllerTest extends TestCase
{
    use TestIndex, TestEdit, TestUpdate;

    protected $urlPrefix  = 'admin/oauthUser/';
    protected $table      = 'oauth_users';
    protected $updateData = [
        'oauth_client_id'          => 2,
        'name'                     => '编辑',
        'avatar'                   => '/uploads/article/default.jpg',
        'openid'                   => '',
        'access_token'             => '',
        'last_login_ip'            => '127.0.0.1',
        'login_times'              => 2,
        'email'                    => 'update@baijunyao.com',
        'is_admin'                 => 1,
    ];
}
