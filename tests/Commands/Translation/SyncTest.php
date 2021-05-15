<?php

declare(strict_types=1);

namespace Tests\Commands\Translation;

use Mockery;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Tests\TestCase;

class SyncTest extends TestCase
{
    public function testCommand()
    {
        $googleTranslate = Mockery::mock('overload:' . GoogleTranslate::class);
        $googleTranslate->shouldReceive('setUrl->setTarget->translate')->andReturn('Test');

        $this->artisan('translation:sync')->assertExitCode(0);
    }
}
