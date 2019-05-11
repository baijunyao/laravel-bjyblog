<?php

namespace Tests\Feature\Admin;

use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestUpdate;

class OauthClientControllerTest extends TestCase
{
    use TestIndex, TestEdit, TestUpdate;

    protected $urlPrefix  = 'admin/oauthClient/';
    protected $table      = 'oauth_clients';
    protected $updateData = [
        'client_id'     => 'updated client id',
        'client_secret' => 'updated client secret',
    ];
}
