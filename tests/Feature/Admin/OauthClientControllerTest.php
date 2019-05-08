<?php

namespace Tests\Feature\Admin;

use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestUpdate;

class OauthClientControllerTest extends TestCase
{
    use TestIndex;

    protected $urlPrefix  = 'admin/oauthClient/';
    protected $table      = 'oauth_clients';
}
