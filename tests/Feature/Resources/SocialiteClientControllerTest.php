<?php

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Rest\TestIndex;
use Baijunyao\LaravelTestSupport\Rest\TestShow;
use Baijunyao\LaravelTestSupport\Rest\TestUpdate;

class SocialiteClientControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate;

    protected $updateData = [
        'client_id'     => 'updated client id',
        'client_secret' => 'updated client secret',
    ];
}
