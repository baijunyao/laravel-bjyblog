<?php

namespace App\Console\Commands\Make;

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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        $resourcePath = app_path("Http/Resources/{$name}.php");

        if (!file_exists($resourcePath)) {
            $resourceContent = <<<PHP
<?php

namespace App\\Http\\Resources;

class {$name} extends Base
{
}

PHP;
            file_put_contents($resourcePath, $resourceContent);
        }

        $resourceControllerPath = app_path("Http/Controllers/Resources/{$name}Controller.php");

        if (!file_exists($resourceControllerPath)) {
            $resourceControllerContent = <<<PHP
<?php

namespace App\\Http\\Controllers\\Resources;

use App\\Http\\Controllers\\Resources\\Rest\\Destroy;
use App\\Http\\Controllers\\Resources\\Rest\\ForceDelete;
use App\\Http\\Controllers\\Resources\\Rest\\Index;
use App\\Http\\Controllers\\Resources\\Rest\\Restore;
use App\\Http\\Controllers\\Resources\\Rest\\Show;
use App\\Http\\Controllers\\Resources\\Rest\\Store;
use App\\Http\\Controllers\\Resources\\Rest\\Update;

class {$name}Controller extends Controller
{
    use Index, Show, Store, Update, Destroy, Restore, ForceDelete;
}

PHP;
            file_put_contents($resourceControllerPath, $resourceControllerContent);
        }

        $resourceTestPath = base_path("tests/Feature/Resources/{$name}ControllerTest.php");

        if (!file_exists($resourceTestPath)) {
            $resourceTestContent = <<<PHP
<?php

namespace Tests\\Feature\\Resources;

use Baijunyao\\LaravelTestSupport\\Rest\\TestDestroy;
use Baijunyao\\LaravelTestSupport\\Rest\\TestForceDelete;
use Baijunyao\\LaravelTestSupport\\Rest\\TestIndex;
use Baijunyao\\LaravelTestSupport\\Rest\\TestRestore;
use Baijunyao\\LaravelTestSupport\\Rest\\TestShow;
use Baijunyao\\LaravelTestSupport\\Rest\\TestStore;
use Baijunyao\\LaravelTestSupport\\Rest\\TestStoreValidation;
use Baijunyao\\LaravelTestSupport\\Rest\\TestUpdate;
use Baijunyao\\LaravelTestSupport\\Rest\\TestUpdateValidation;

class {$name}ControllerTest extends TestCase
{
    use TestIndex, TestShow, TestStore, TestStoreValidation, TestUpdate, TestUpdateValidation, TestDestroy, TestRestore, TestForceDelete;

    protected \$storeData  = [
    ];
    protected \$updateData = [
    ];
}

PHP;
            file_put_contents($resourceTestPath, $resourceTestContent);
        }
    }
}
