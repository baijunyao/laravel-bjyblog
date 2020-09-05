<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_5_6_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tags')->delete();
        DB::table('article_tags')->insert([
            0 => [
                'article_id' => 1,
                'tag_id'     => 1,
                'created_at' => '2017-7-18 07:35:12',
                'updated_at' => '2016-7-18 07:35:12',
                'deleted_at' => null,
            ],
        ]);
    }
}
