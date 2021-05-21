<?php

declare(strict_types=1);

namespace App\Extensions\Illuminate\Foundation\Console;

use App;
use Illuminate\Foundation\Console\TestMakeCommand as BaseTestMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class TestMakeCommand extends BaseTestMakeCommand
{
    public const TEST_PATH_IN_STORAGE = 'framework/testing/tests';

    /**
     * {@inheritdoc}
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->option('command')) {
            return $rootNamespace . '\Commands';
        }

        return parent::getDefaultNamespace($rootNamespace);
    }

    /**
     * {@inheritdoc}
     */
    protected function getPath($name)
    {
        $path = parent::getPath($name);

        if (App::runningUnitTests()) {
            $path = str_replace(base_path('tests'), storage_path(static::TEST_PATH_IN_STORAGE), $path);
        }

        return $path;
    }

    protected function getStub()
    {
        return $this->option('command')
            ? $this->resolveStubPath('/stubs/test.command.stub')
            : parent::getStub();
    }

    /**
     * @return array<int,array<int,string|int>>
     */
    protected function getOptions()
    {
        return array_merge(parent::getOptions(), [
            ['command', 'c', InputOption::VALUE_NONE, 'Create a command test.'],
        ]);
    }
}
