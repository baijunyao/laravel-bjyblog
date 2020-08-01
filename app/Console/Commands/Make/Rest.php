<?php

declare(strict_types=1);

namespace App\Console\Commands\Make;

use File;
use Illuminate\Console\Command;

class Rest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:rest {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle(): int
    {
        /** @var string $name */
        $name         = $this->argument('name');
        $resourcePath = app_path("Http/Resources/{$name}.php");

        if (!File::exists($resourcePath)) {
            File::put($resourcePath, str_replace('{name}', $name, File::get(app_path('Console/Commands/Make/stubs/resource.stub'))));
        }

        $resourceControllerPath = app_path("Http/Controllers/Resources/{$name}Controller.php");

        if (!File::exists($resourceControllerPath)) {
            File::put($resourceControllerPath, str_replace('{name}', $name, File::get(app_path('Console/Commands/Make/stubs/resource-controller.stub'))));
        }

        $resourceTestPath = base_path("tests/Feature/Resources/{$name}ControllerTest.php");

        if (!File::exists($resourceTestPath)) {
            File::put($resourceTestPath, str_replace('{name}', $name, File::get(app_path('Console/Commands/Make/stubs/resource-controller-test.stub'))));
        }

        return 0;
    }
}
