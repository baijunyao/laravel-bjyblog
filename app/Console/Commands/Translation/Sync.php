<?php

declare(strict_types=1);

namespace App\Console\Commands\Translation;

use App;
use App\Support\TencentTranslate;
use File;
use Illuminate\Console\Command;
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
        $langPath = app()->langPath();
        $langs    = ['fr', 'ru'];
        $zhKeys   = array_keys(json_decode(File::get($langPath . '/zh-CN.json'), true));

        $tencent_translate = app()->make(TencentTranslate::class);

        foreach ($langs as $lang) {
            $original_content = json_decode(File::get($langPath . "/{$lang}.json"), true);

            /** @var array<int, string> $diff_keys */
            $diff_keys = array_diff($zhKeys, array_keys($original_content));

            $updated_content = $original_content;

            foreach ($diff_keys as $diff_key) {
                $updated_content[$diff_key] = $tencent_translate->toEnglish($diff_key);
            }

            ksort($updated_content);

            if ($original_content !== $updated_content && App::runningUnitTests()) {
                $output = new ConsoleOutput();
                $output->writeln('<error>Please execute `php artisan translation:sync` command.</error>');

                return 1;
            }

            File::put($langPath . "/{$lang}.json", json_encode($updated_content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n");
        }

        $this->call('translation:remove-unused');

        return 0;
    }
}
