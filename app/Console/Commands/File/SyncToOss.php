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
        $ossDisk   = Storage::disk('oss_uploads');
        $localDisk = Storage::disk('public');

        assert($ossDisk instanceof \Illuminate\Filesystem\FilesystemAdapter);
        assert($localDisk instanceof \Illuminate\Filesystem\FilesystemAdapter);

        $localFilePaths = $localDisk->allFiles('uploads');

        foreach ($localFilePaths as $localFilePath) {
            $needSync = false;

            if ($ossDisk->has($localFilePath)) {
                if ($localDisk->getTimestamp($localFilePath) > $ossDisk->getTimestamp($localFilePath)) {
                    $needSync = true;
                }
            } else {
                $needSync = true;
            }

            if ($needSync) {
                $ossDisk->put($localFilePath, $localDisk->get($localFilePath));

                $this->info('Uploaded file: ' . $localFilePath);
            }
        }

        return 0;
    }
}
