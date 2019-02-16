<?php

namespace Tests\Feature\Admin;

class IndexControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->adminGet('admin/index/index');
        $response->assertStatus(200);
    }
}
