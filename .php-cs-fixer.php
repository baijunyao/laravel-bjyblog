<?php

declare(strict_types=1);

use Baijunyao\PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->notPath('app/Console/Kernel.php')
    ->notPath('app/Http/Kernel.php')
    ->exclude('bootstrap')
    ->exclude('config')
    ->exclude('database/factories')
    ->exclude('public')
    ->exclude('resources')
    ->exclude('storage')
    ->notPath('_ide_helper.php')
    ->notPath('_ide_helper_models.php')
    ->notPath('server.php')
    ->in(__DIR__);

return (new Config())->setFinder($finder);
