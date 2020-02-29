<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

class TagControllerTest extends TestCase
{
    public function testShow()
    {
        $this->get('/tag/1')->assertStatus(200);
    }

    public function testShowNotFound()
    {
        $this->get('/tag/100')->assertNotFound();
    }
}
