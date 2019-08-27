<?php

namespace Tests\Commands\Upgrade\V5_8_4_0\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $file = collect(File::files(database_path('seeds')))
            ->transform(function ($v) {
                return [
                    'cTime'    => $v->getCTime(),
                    'filename' => basename($v->getFilename(), '.php'),
                ];
            })
            ->filter(function ($v) {
                return $v['filename'] === 'DatabaseSeeder' ? false : true;
            })
            ->sortBy('cTime')
            ->pluck('filename');
        // 自动 call 目录下的文件
        foreach ($file as $k => $v) {
            $this->call($v);
        }
    }
}
