<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_5_6_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->comment('分类主键id');
            $table->string('name', 15)->default('')->comment('分类名称');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('description')->default('')->comment('描述');
            $table->boolean('sort')->default(0)->comment('排序');
            $table->boolean('pid')->default(0)->comment('父级栏目id');
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
        Schema::dropIfExists('categories');
    }
}
