<?php

namespace Tests\Feature\Admin;

use Tests\Feature\Admin\CURD\TestEdit;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestUpdate;

class SocialiteClientControllerTest extends TestCase
{
    use TestIndex, TestEdit, TestUpdate;

    protected $urlPrefix  = 'admin/socialiteClient/';
    protected $table      = 'socialite_clients';
    protected $updateData = [
        'client_id'     => 'updated client id',
        'client_secret' => 'updated client secret',
    ];
}
