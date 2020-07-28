<?php

declare(strict_types=1);

namespace App\Console\Commands\File;

use Illuminate\Console\Command;
use Storage;

class SyncToOss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:sync-to-oss';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync files to OSS';

    public function handle(): int
    {
        $localFilePaths = Storage::disk('public')->allFiles('uploads');

        foreach ($localFilePaths as $localFilePath) {
            $needSync = false;

            if (Storage::disk('oss_uploads')->has($localFilePath)) {
                if (Storage::disk('public')->getTimestamp($localFilePath) > Storage::disk('oss_uploads')->getTimestamp($localFilePath)) {
                    $needSync = true;
                }
            } else {
                $needSync = true;
            }

            if ($needSync) {
                Storage::disk('oss_uploads')->put($localFilePath, Storage::disk('public')->get($localFilePath));

                $this->info('Uploaded file: ' . $localFilePath);
            }
        }

        return 0;
    }
}
