<?php

declare(strict_types=1);

namespace Tests\Commands\Make;

use App\Extensions\Illuminate\Foundation\Console\TestMakeCommand;
use File;
use Tests\Commands\TestCase;

class TestTest extends TestCase
{
    public function testFeature()
    {
        $path = storage_path(TestMakeCommand::TEST_PATH_IN_STORAGE . '/Feature/FeatureTest.php');
        File::delete($path);

        static::assertFileDoesNotExist($path);
        $this->artisan('make:test FeatureTest')->assertExitCode(0);
        static::assertFileExists($path);
    }

    public function testUnit()
    {
        $path = storage_path(TestMakeCommand::TEST_PATH_IN_STORAGE . '/Commands/CommandTest.php');
        File::delete($path);

        static::assertFileDoesNotExist($path);
        $this->artisan('make:test CommandTest --command')->assertExitCode(0);
        static::assertFileExists($path);
    }
}
