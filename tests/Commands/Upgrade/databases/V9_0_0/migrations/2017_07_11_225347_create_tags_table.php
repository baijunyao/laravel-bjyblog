<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V9_0_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @update 2019年10月15日 11:28:45 by jason
     * @desc 添加 标签的关键字和描述。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id')->comment('标签主键');
            $table->string('name', 20)->default('')->comment('标签名');
            $table->string('slug')->default('')->comment('slug');
            $table->string('keywords')->default('')->comment('标签的关键字');
            $table->string('description')->default('')->comment('标签的描述');
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
        Schema::dropIfExists('tags');
    }
}
