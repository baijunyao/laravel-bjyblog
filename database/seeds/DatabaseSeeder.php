<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticleTagsTableSeeder::class);
        $this->call(ChatsTableSeeder::class);
        $this->call(FriendshipLinksTableSeeder::class);
        $this->call(OauthUsersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(GitProjectsTableSeeder::class);
    }
}
