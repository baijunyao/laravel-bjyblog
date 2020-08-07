<?php

declare(strict_types=1);

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
            $className = $file->getFilenameWithoutExtension();

            if ($className !== __CLASS__) {
                $this->call($className);
            }
        }
    }
}
