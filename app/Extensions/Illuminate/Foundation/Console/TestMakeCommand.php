<?php

namespace App\Extensions\Illuminate\Foundation\Console;

use Illuminate\Foundation\Console\TestMakeCommand as BaseTestMakeCommand;

class TestMakeCommand extends BaseTestMakeCommand
{
    protected $signature = 'make:test {name : The name of the class} {--unit : Create a unit test} {--command : Create a command test}';

    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->option('command')) {
            return $rootNamespace . '\Commands';
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
