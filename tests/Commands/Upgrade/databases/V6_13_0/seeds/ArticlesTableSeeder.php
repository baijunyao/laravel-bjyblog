<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V6_13_0\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();
        DB::table('articles')->insert([
            [
                'id'          => 1,
                'category_id' => 1,
                'title'       => '欢迎使用 laravel-bjyblog',
                'slug'        => 'welcome-to-laravel-bjyblog',
                'author'      => '白俊遥',
                'markdown'    => '1. [切换语言](https://baijunyao.com/docs/laravel-bjyblog/其他配置.html)
![](/uploads/article/5d9829577d311.png)
2. [清空测试数据](https://baijunyao.com/docs/laravel-bjyblog/清空测试数据.html)
3. [升级版本](https://baijunyao.com/docs/laravel-bjyblog/升级版本.html)',
                'html'        => '<ol>
<li>
<a href="https://baijunyao.com/docs/laravel-bjyblog/%E5%85%B6%E4%BB%96%E9%85%8D%E7%BD%AE.html">切换语言</a>
<img src="/uploads/article/5d9829577d311.png" alt="" />
</li>
<li>
<a href="https://baijunyao.com/docs/laravel-bjyblog/%E6%B8%85%E7%A9%BA%E6%B5%8B%E8%AF%95%E6%95%B0%E6%8D%AE.html">清空测试数据</a>
</li>
<li>
<a href="https://baijunyao.com/docs/laravel-bjyblog/%E5%8D%87%E7%BA%A7%E7%89%88%E6%9C%AC.html">升级版本</a>
</li>
</ol>
',
                'description' => '欢迎使用 laravel-bjyblog',
                'keywords'    => 'laravel',
                'cover'       => '/uploads/article/5d9829577d311.png',
                'is_top'      => 1,
                'created_at'  => '2017-7-16 07:35:12',
                'updated_at'  => '2016-7-16 07:35:12',
                'deleted_at'  => null,
            ],
            [
                'id'          => 2,
                'category_id' => 1,
                'title'       => '已删除',
                'slug'        => 'deleted',
                'author'      => '白俊遥',
                'markdown'    => '内容',
                'html'        => '内容',
                'description' => '描述',
                'keywords'    => 'test',
                'cover'       => '/uploads/article/5d9829577d311.png',
                'is_top'      => 0,
                'created_at'  => '2019-01-04 16:35:12',
                'updated_at'  => '2019-01-04 16:35:12',
                'deleted_at'  => '2019-01-04 16:35:12',
            ],
            [
                'id'          => 3,
                'category_id' => 1,
                'title'       => 'Welcome to laravel-bjyblog',
                'slug'        => 'welcome-to-laravel-bjyblog',
                'author'      => 'baijunyao',
                'markdown'    => '1. [Switch language](https://baijunyao.com/docs/laravel-bjyblog/en/OtherConfig.html)
![](/uploads/article/5d9829577d311.png)
2. [Clear test data](https://baijunyao.com/docs/laravel-bjyblog/en/ClearTestData.html)
3. [Upgrade version](https://baijunyao.com/docs/laravel-bjyblog/en/Upgrade.html)',
                'html'        => '<ol>
<li>
<a href="https://baijunyao.com/docs/laravel-bjyblog/en/OtherConfig.html">Switch language</a>
<img src="/uploads/article/5d9829577d311.png" alt="" />
</li>
<li>
<a href="https://baijunyao.com/docs/laravel-bjyblog/en/ClearTestData.html">Clear test data</a>
</li>
<li>
<a href="https://baijunyao.com/docs/laravel-bjyblog/en/Upgrade.html">Upgrade version</a>
</li>
</ol>
',
                'description' => 'welcome to laravel-bjyblog',
                'keywords'    => 'laravel-bjyblog',
                'cover'       => '/uploads/article/5d9829577d311.png',
                'is_top'      => 0,
                'created_at'  => '2019-10-05 14:35:12',
                'updated_at'  => '2019-10-05 14:35:12',
                'deleted_at'  => null,
            ],
        ]);
    }
}
