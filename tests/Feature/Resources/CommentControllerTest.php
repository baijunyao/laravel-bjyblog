<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Rest\TestDestroy;
use Baijunyao\LaravelTestSupport\Rest\TestForceDelete;
use Baijunyao\LaravelTestSupport\Rest\TestIndex;
use Baijunyao\LaravelTestSupport\Rest\TestRestore;
use Baijunyao\LaravelTestSupport\Rest\TestShow;
use Baijunyao\LaravelTestSupport\Rest\TestUpdate;

class CommentControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate, TestDestroy, TestRestore, TestForceDelete;

    protected $updateData = [
        'content'    => 'Updated Content',
        'is_audited' => 0,
    ];
}
