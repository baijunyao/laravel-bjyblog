<?php

namespace Tests\Commands\Upgrade\V5_8_6_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOauthClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('oauth_clients', function (Blueprint $table) {
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
        \Schema::dropIfExists('oauth_clients');
    }
}
