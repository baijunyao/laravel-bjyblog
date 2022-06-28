<?php

declare(strict_types=1);

namespace App\Extensions\LaravelIdeHelper\Console;

use ReflectionClass;
use Str;

class ModelsCommand extends \Barryvdh\LaravelIdeHelper\Console\ModelsCommand
{
    /**
     * {@inheritdoc}
     */
    protected function createPhpDocs($class)
    {
        $modelName    = Str::afterLast($class, '\\');
        /** @var class-string $schema */
        $schema       = '\\App\\Models\\Schemas\\' . $modelName . 'Schema';
        $schemaExists = class_exists($schema);

        if ($schemaExists) {
            $class = $schema;
        }

        $output = parent::createPhpDocs($class);

        if ($schemaExists) {
            $schemaReflection = new ReflectionClass($schema);
            $schemaFilePath   = $schemaReflection->getFileName();

            if ($schemaFilePath !== false) {
                $schemaContent = $this->files->get($schemaFilePath);
                $schemaContent = str_replace(
                    [
                        'abstract /**',
                        " */\nclass {$modelName}Schema extends",
                        "* @method static \\Illuminate\\Database\\Eloquent\\Builder|{$modelName} newModelQuery()\n",
                        "* @method static \\Illuminate\\Database\\Eloquent\\Builder|{$modelName} newQuery()\n",
                        "* @method static \\Illuminate\\Database\\Query\\Builder|{$modelName} onlyTrashed()\n",
                        "* @method static \\Illuminate\\Database\\Eloquent\\Builder|{$modelName} query()\n",
                        "* @method static \\Illuminate\\Database\\Query\\Builder|{$modelName} withTrashed()\n",
                        "* @method static \\Illuminate\\Database\\Query\\Builder|{$modelName} withoutTrashed()\n",
                        "* @method static \\Kalnoy\\Nestedset\\QueryBuilder|{$modelName} newModelQuery()\n",
                        "* @method static \\Kalnoy\\Nestedset\\QueryBuilder|Comment d()\n",
                        "* @method static \\Kalnoy\\Nestedset\\QueryBuilder|Comment newModelQuery()\n",
                        "* @method static \\Kalnoy\\Nestedset\\QueryBuilder|Comment newQuery()\n",
                        "* @method static \\Kalnoy\\Nestedset\\QueryBuilder|Comment query()\n",
                        "  * @method static \\Kalnoy\\Nestedset\\Collection|static[] get(\$columns = ['*'])",
                        '       * @mixin \\Eloquent',
                    ],
                    [
                        '/**',
                        " */\nabstract class {$modelName}Schema extends",
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        " * @method static \\Kalnoy\\Nestedset\\Collection|static[] get(\$columns = ['*'])",
                        ' * @mixin \\Eloquent',
                    ],
                    $schemaContent
                );

                $this->files->put($schemaFilePath, $schemaContent);
            }
        }

        return $output;
    }
}
