<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

class FeedControllerTest extends TestCase
{
    public function testFeed()
    {
        $this->get('/feed')->assertStatus(200);
    }
}
