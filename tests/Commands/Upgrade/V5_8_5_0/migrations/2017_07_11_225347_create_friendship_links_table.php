<?php

namespace Tests\Commands\Upgrade\V5_8_5_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFriendshipLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('friendship_links', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('name', 50)->default('')->comment('链接名');
            $table->string('url')->default('')->comment('链接地址');
            $table->boolean('sort')->nullable()->default(1)->comment('排序');
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
        \Schema::dropIfExists('friendship_links');
    }
}
