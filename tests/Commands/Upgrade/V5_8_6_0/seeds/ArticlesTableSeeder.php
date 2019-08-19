<?php

namespace Tests\Commands\Upgrade\V5_8_6_0\Seeds;

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('articles')->truncate();
        $title = '写给 thinkphp 开发者的 laravel 系列教程 (一) 序言';
        \DB::table('articles')->insert([
            [
                'id'          => 1,
                'category_id' => 1,
                'title'       => $title,
                'slug'        => 'laravel-series-tutorial-for-thinkphp-developers-1-preface',
                'author'      => '白俊遥',
                'markdown'    => '终于；终于；终于；
开始正式写 laravel 系列了；
本系列教程主要面向的是多少懂点 thinkphp3.X 的开发者们；
我把我从tp3转到laravel的历程转成一篇篇的文章教程；
愿这一系列的文章；
能成为童鞋们踏入laravel的引路人；

如果还没下定决定要使用laravel；
那么我上来就是一个连接；
[关于 thinkphp 和 laravel 框架的选择](http://baijunyao.com/article/109)
不是别人说好我也跟着说好的；
而是我实实在在的使用过后；
不断的发现 laravel 的优雅；
真心喜欢；才这么推荐的；

另外学习使用 laravel 不同于 thinkphp；
thinkphp 的问题；百度一下基本都能解决；
laravel 一定要有一把梯子来翻墙；
google是必不可少的；
现在体会不到没关系；
咱边学边感受；
最近一段时间大批的vpn被关停了；
这里我推荐一款依然坚挺的；
我一直在用的；
也比较喜欢的`免费`翻墙软件；
[推荐开发工具系列之 -- 翻墙软件 lantern](http://baijunyao.com/article/107)

最后给童鞋们推荐比较不错的国内的laravel网站；
[Laravel China 社区](https://laravel-china.org/)
[Laravel 学院](http://laravelacademy.org/)
[laravel速查表](https://cs.laravel-china.org/)

种一棵树最好的时间是十年前；其次是现在；
让我们开始吧；
![laravel](/uploads/article/5958ab4dd9db4.jpg "laravel")',
                'html'        => '<p>终于；终于；终于；<br>开始正式写 laravel 系列了；<br>本系列教程主要面向的是多少懂点 thinkphp3.X 的开发者们；<br>我把我从tp3转到laravel的历程转成一篇篇的文章教程；<br>愿这一系列的文章；<br>能成为童鞋们踏入laravel的引路人；</p><p>如果还没下定决定要使用laravel；<br>那么我上来就是一个连接；<br><a href="http://baijunyao.com/article/109">关于 thinkphp 和 laravel 框架的选择</a><br>不是别人说好我也跟着说好的；<br>而是我实实在在的使用过后；<br>不断的发现 laravel 的优雅；<br>真心喜欢；才这么推荐的；</p><p>另外学习使用 laravel 不同于 thinkphp；<br>thinkphp 的问题；百度一下基本都能解决；<br>laravel 一定要有一把梯子来翻墙；<br>google是必不可少的；<br>现在体会不到没关系；<br>咱边学边感受；<br>最近一段时间大批的vpn被关停了；<br>这里我推荐一款依然坚挺的；<br>我一直在用的；<br>也比较喜欢的<code>免费</code>翻墙软件；<br><a href="http://baijunyao.com/article/107">推荐开发工具系列之 -- 翻墙软件 lantern</a></p><p>最后给童鞋们推荐比较不错的国内的laravel网站；<br><a href="https://laravel-china.org/">Laravel China 社区</a><br><a href="http://laravelacademy.org/">Laravel 学院</a><br><a href="https://cs.laravel-china.org/">laravel速查表</a></p><p>种一棵树最好的时间是十年前；其次是现在；<br>让我们开始吧；<br><img src="/uploads/article/5958ab4dd9db4.jpg" alt="laravel" title="laravel"></p>',
                'description' => '终于；终于；终于；
开始正式写 laravel 系列了；
本系列教程主要面向的是多少懂点 thinkphp3.X 的开发者们；
我把我从tp3转到laravel的历程转成一篇篇的文章教程；
愿这一系列的文章；
能成为童鞋们踏入laravel的引路人；

如果还没下定决定要使用laravel；
那么我上来就是一个连接；

不是别人说好我也跟着说好的；
而是我实实在在的使用过后；...',
                'keywords'   => 'laravel,thinkphp, 教程',
                'cover'      => '/uploads/article/5958ab4dd9db4.jpg',
                'is_top'     => 1,
                'click'      => 666,
                'created_at' => '2017-7-16 07:35:12',
                'updated_at' => '2016-7-16 07:35:12',
                'deleted_at' => null,
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
                'cover'       => '/uploads/article/5958ab4dd9db4.jpg',
                'is_top'      => 0,
                'click'       => 222,
                'created_at'  => '2019-01-04 16:35:12',
                'updated_at'  => '2019-01-04 16:35:12',
                'deleted_at'  => '2019-01-04 16:35:12',
            ],
        ]);
    }
}
