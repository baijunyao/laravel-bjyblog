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

    public function testIndexGuest()
    {
        $response = $this->get('admin/index/index');
        $response->assertRedirect('admin/login/index');
    }
}
