<?php

namespace Tests\Commands\Upgrade\V5_8_6_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('consoles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('名称');
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
        \Schema::dropIfExists('consoles');
    }
}
