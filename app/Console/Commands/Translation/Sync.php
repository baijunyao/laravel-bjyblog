<?php

declare(strict_types=1);

namespace App\Console\Commands\Translation;

use File;
use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;

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
            $content = json_decode(File::get(resource_path("lang/{$lang}.json")), true);

            /** @var array<int, string> $diffKeys */
            $diffKeys = array_diff($zhKeys, array_keys($content));

            foreach ($diffKeys as $diffKey) {
                $content[$diffKey] = $googleTranslate->setTarget($lang)->translate($diffKey);
            }

            ksort($content);

            File::put(resource_path("lang/{$lang}.json"), json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n");
        }

        $this->call('translation:remove-unused');

        return 0;
    }
}
