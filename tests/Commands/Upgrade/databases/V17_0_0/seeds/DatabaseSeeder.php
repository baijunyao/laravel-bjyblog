<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V17_0_0\Seeds;

use File;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $files = File::files(database_path('seeds'));

        foreach ($files as $file) {
            $classFQCN = 'Database\\Seeders\\' . $file->getFilenameWithoutExtension();

            if ($classFQCN !== __CLASS__) {
                $this->call($classFQCN);
            }
        }
    }
}
