<?php

namespace Tests\Commands\Upgrade\V5_8_5_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('navs', function (Blueprint $table) {
            $table->increments('id')->comment('菜单主键');
            $table->tinyInteger('sort')->default(1)->comment('排序');
            $table->string('name')->default('')->comment('菜单名');
            $table->string('url')->default('')->comment('链接');
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
        \Schema::dropIfExists('navs');
    }
}
