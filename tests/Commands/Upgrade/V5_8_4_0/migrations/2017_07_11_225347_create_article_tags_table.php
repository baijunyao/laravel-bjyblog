<?php

namespace Tests\Commands\Upgrade\V5_8_4_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('article_tags', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->default(0)->comment('文章id');
            $table->integer('tag_id')->unsigned()->default(0)->comment('标签id');
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
        \Schema::dropIfExists('article_tags');
    }
}
