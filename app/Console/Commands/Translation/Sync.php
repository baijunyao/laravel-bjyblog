<?php

declare(strict_types=1);

namespace App\Console\Commands\Translation;

use App;
use File;
use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Symfony\Component\Console\Output\ConsoleOutput;

class Sync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translation:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync translation';

    public function handle(): int
    {
        $langs = ['fr', 'ru'];

        $zhKeys = array_keys(json_decode(File::get(resource_path('lang/zh-CN.json')), true));

        $googleTranslate = new GoogleTranslate('en');
        $googleTranslate->setUrl('http://translate.google.cn/translate_a/single');

        foreach ($langs as $lang) {
            $originalContent = json_decode(File::get(resource_path("lang/{$lang}.json")), true);

            /** @var array<int, string> $diffKeys */
            $diffKeys = array_diff($zhKeys, array_keys($originalContent));

            $updatedContent = $originalContent;

            foreach ($diffKeys as $diffKey) {
                $updatedContent[$diffKey] = $googleTranslate->setTarget($lang)->translate($diffKey);
            }

            ksort($updatedContent);

            if (App::runningUnitTests() && $originalContent !== $updatedContent) {
                $output = new ConsoleOutput();
                $output->writeln('<error>Please execute `php artisan translation:sync` command.</error>');

                return 1;
            }

            File::put(resource_path("lang/{$lang}.json"), json_encode($updatedContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n");
        }

        $this->call('translation:remove-unused');

        return 0;
    }
}
