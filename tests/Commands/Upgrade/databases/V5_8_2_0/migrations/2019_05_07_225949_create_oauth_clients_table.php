<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V5_8_2_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('client_id')->default('');
            $table->string('client_secret')->default('');
            $table->string('client_id_config')->default('');
            $table->string('client_secret_config')->default('');
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
        Schema::dropIfExists('oauth_clients');
    }
}
