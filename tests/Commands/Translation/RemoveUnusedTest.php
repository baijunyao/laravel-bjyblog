<?php

declare(strict_types=1);

namespace Tests\Commands\Translation;

use Tests\TestCase;

class RemoveUnusedTest extends TestCase
{
    public function testCommand()
    {
        $this->artisan('translation:remove-unused')->assertExitCode(0);
    }
}
