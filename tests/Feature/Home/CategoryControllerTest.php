<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

class CategoryControllerTest extends TestCase
{
    public function testShow()
    {
        $this->get('/category/1')->assertStatus(200);
    }

    public function testShowNotFound()
    {
        $this->get('/category/100')->assertNotFound();
    }
}
