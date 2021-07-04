<?php

declare(strict_types=1);

namespace App\Console\Commands\Make;

use File;
use Illuminate\Console\Command;

class Restful extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:restful {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle(): int
    {
        /** @var string $name */
        $name          = $this->argument('name');
        $resource_path = app_path("Http/Resources/{$name}.php");

        if (!File::exists($resource_path)) {
            File::put($resource_path, str_replace('{name}', $name, File::get(app_path('Console/Commands/Make/stubs/resource.stub'))));
        }

        $resource_controller_path = app_path("Http/Controllers/Resources/{$name}Controller.php");

        if (!File::exists($resource_controller_path)) {
            File::put($resource_controller_path, str_replace('{name}', $name, File::get(app_path('Console/Commands/Make/stubs/resource-controller.stub'))));
        }

        $resource_test_path = base_path("tests/Feature/Resources/{$name}ControllerTest.php");

        if (!File::exists($resource_test_path)) {
            File::put($resource_test_path, str_replace('{name}', $name, File::get(app_path('Console/Commands/Make/stubs/resource-controller-test.stub'))));
        }

        return 0;
    }
}
