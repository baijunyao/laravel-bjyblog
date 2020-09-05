<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V6_13_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('primary_key');
            $table->string('secondary_key')->nullable();
            $table->unsignedBigInteger('score');
            $table->text('list');
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->unique(['primary_key', 'secondary_key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
