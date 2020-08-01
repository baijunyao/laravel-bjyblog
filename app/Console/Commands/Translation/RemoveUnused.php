<?php

declare(strict_types=1);

namespace App\Console\Commands\Translation;

use File;
use Illuminate\Console\Command;
use Str;

class RemoveUnused extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translation:remove-unused';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove unused translation';

    public function handle(): int
    {
        $languages = [
            'zh-CN' => [],
            'ru'    => [],
            'fr'    => [],
        ];

        foreach ($languages as $language => $content) {
            $languages[$language] = json_decode(File::get(resource_path("lang/{$language}.json")), true);
        }

        $allFileContents = '';

        foreach (array_merge(File::allFiles(app_path()), File::allFiles(resource_path('views'))) as $file) {
            /** @var \Symfony\Component\Finder\SplFileInfo $file */
            $allFileContents .= $file->getContents();
        }

        foreach ($languages['zh-CN'] as $key => $value) {
            if (!Str::contains($allFileContents, "translate('$key')")) {
                foreach ($languages as $language => $content) {
                    unset($languages[$language][$key]);
                }

                $this->info('Removed: ' . $key);
            }
        }

        foreach ($languages as $language => $content) {
            ksort($content);

            File::put(resource_path("lang/{$language}.json"), json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n");
        }

        return 0;
    }
}
