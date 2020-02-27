<?php

declare(strict_types=1);

namespace Tests\Feature\Home;

class NoteControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/note')->assertStatus(200);
    }
}
