<?php

namespace Tests\Commands\Upgrade\V5_8_8_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocialiteClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('socialite_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('client_id')->default('');
            $table->string('client_secret')->default('');
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
        \Schema::dropIfExists('socialite_clients');
    }
}
