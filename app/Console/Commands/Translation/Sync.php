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

        $google_translate = new GoogleTranslate('en');
        $google_translate->setUrl('http://translate.google.cn/translate_a/single');

        foreach ($langs as $lang) {
            $original_content = json_decode(File::get(resource_path("lang/{$lang}.json")), true);

            /** @var array<int, string> $diff_keys */
            $diff_keys = array_diff($zhKeys, array_keys($original_content));

            $updated_content = $original_content;

            foreach ($diff_keys as $diffKey) {
                $updated_content[$diffKey] = $google_translate->setTarget($lang)->translate($diffKey);
            }

            ksort($updated_content);

            if (App::runningUnitTests() && $original_content !== $updated_content) {
                $output = new ConsoleOutput();
                $output->writeln('<error>Please execute `php artisan translation:sync` command.</error>');

                return 1;
            }

            File::put(resource_path("lang/{$lang}.json"), json_encode($updated_content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n");
        }

        $this->call('translation:remove-unused');

        return 0;
    }
}
