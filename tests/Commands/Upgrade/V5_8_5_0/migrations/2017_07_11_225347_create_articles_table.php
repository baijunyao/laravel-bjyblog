<?php

namespace Tests\Commands\Upgrade\V5_8_5_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->comment('文章表主键');
            $table->boolean('category_id')->default(0)->comment('分类id');
            $table->string('title')->default('')->comment('标题');
            $table->string('slug')->default('')->comment('slug');
            $table->string('author')->default('')->comment('作者');
            $table->mediumText('markdown')->comment('markdown文章内容');
            $table->mediumText('html')->comment('markdown转的html页面');
            $table->string('description')->default('')->comment('描述');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('cover')->default('')->comment('封面图');
            $table->boolean('is_top')->default(0)->comment('是否置顶 1是 0否');
            $table->integer('click')->unsigned()->default(0)->comment('点击数');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('articles');
    }
}
