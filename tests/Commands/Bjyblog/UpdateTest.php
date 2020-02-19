<?php

declare(strict_types=1);

namespace Tests\Commands\Bjyblog;

use App\Models\Console;
use File;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function testCommand()
    {
        $names = collect(File::files(app_path('Console/Commands/Upgrade')))->map(function ($file) {
            return 'App\\Console\\Commands\\Upgrade\\' . str_replace('.php', '', $file->getRelativePathname());
        });

        static::assertEquals($names->count(), Console::count());
        $names->each(function ($name) {
            $this->assertDatabaseHas('consoles', [
                'name' => $name,
            ]);
        });
    }
}
