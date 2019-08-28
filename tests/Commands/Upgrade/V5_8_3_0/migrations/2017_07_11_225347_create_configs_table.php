<?php

namespace Tests\Commands\Upgrade\V5_8_3_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('configs', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('name', 100)->default('')->comment('配置项键名');
            $table->text('value')->nullable()->comment('配置项键值 1表示开启 0 关闭');
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
        \Schema::dropIfExists('configs');
    }
}
