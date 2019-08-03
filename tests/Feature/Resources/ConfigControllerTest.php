<?php

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Rest\TestIndex;
use Baijunyao\LaravelTestSupport\Rest\TestShow;
use Baijunyao\LaravelTestSupport\Rest\TestUpdate;

class ConfigControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate;

    protected $showId     = 101;
    protected $updateId   = 101;
    protected $updateData = [
        'value' => 'Update',
    ];
}
