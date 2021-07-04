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
        $oss_disk   = Storage::disk('oss_uploads');
        $local_disk = Storage::disk('public');

        assert($oss_disk instanceof \Illuminate\Filesystem\FilesystemAdapter);
        assert($local_disk instanceof \Illuminate\Filesystem\FilesystemAdapter);

        $local_file_paths = $local_disk->allFiles('uploads');

        foreach ($local_file_paths as $local_file_path) {
            $need_sync = false;

            if ($oss_disk->has($local_file_path)) {
                if ($local_disk->getTimestamp($local_file_path) > $oss_disk->getTimestamp($local_file_path)) {
                    $need_sync = true;
                }
            } else {
                $need_sync = true;
            }

            if ($need_sync) {
                $oss_disk->put($local_file_path, $local_disk->get($local_file_path));

                $this->info('Uploaded file: ' . $local_file_path);
            }
        }

        return 0;
    }
}
