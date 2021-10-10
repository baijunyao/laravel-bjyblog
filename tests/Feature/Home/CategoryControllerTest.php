<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

class CategoryControllerTest extends TestCase
{
    public function testShow()
    {
        $this->get('/categories/1')->assertStatus(200);
    }

    public function testShowNotFound()
    {
        $this->get('/categories/100')->assertNotFound();
    }
}
