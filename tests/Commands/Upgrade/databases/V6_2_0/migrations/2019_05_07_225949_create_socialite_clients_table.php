<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V6_2_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialiteClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('socialite_clients')) {
            Schema::create('socialite_clients', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->default('');
                $table->string('icon')->default('');
                $table->string('client_id')->default('');
                $table->string('client_secret')->default('');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socialite_clients');
    }
}
