<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Restful\TestIndex;
use Baijunyao\LaravelTestSupport\Restful\TestShow;
use Baijunyao\LaravelTestSupport\Restful\TestUpdate;

class SocialiteClientControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate;

    protected $updateData = [
        'client_id'     => 'updated client id',
        'client_secret' => 'updated client secret',
    ];
}
