<?php

declare(strict_types=1);

namespace Tests\Feature\Resources;

use Baijunyao\LaravelTestSupport\Restful\TestDestroy;
use Baijunyao\LaravelTestSupport\Restful\TestForceDelete;
use Baijunyao\LaravelTestSupport\Restful\TestIndex;
use Baijunyao\LaravelTestSupport\Restful\TestRestore;
use Baijunyao\LaravelTestSupport\Restful\TestShow;
use Baijunyao\LaravelTestSupport\Restful\TestUpdate;

class CommentControllerTest extends TestCase
{
    use TestIndex, TestShow, TestUpdate, TestDestroy, TestRestore, TestForceDelete;

    protected $updateData = [
        'content'    => 'Updated Content',
        'is_audited' => 0,
    ];
}
