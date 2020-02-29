<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

class OpenSourceControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/openSource')->assertStatus(200);
    }
}
