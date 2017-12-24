<?php

use Illuminate\Database\Seeder;

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
            0 =>[
                'article_id' => 1,
                'tag_id' => 1,
                'created_at' => '2017-7-18 07:35:12',
                'updated_at' => '2016-7-18 07:35:12',
                'deleted_at' => NULL,
            ],
        ]);
    }
}
