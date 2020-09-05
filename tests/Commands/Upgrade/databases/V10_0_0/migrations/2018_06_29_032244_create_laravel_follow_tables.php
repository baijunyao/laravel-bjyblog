<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V10_0_0\Migrations;

/*
 * This file is part of the overtrue/laravel-follow
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelFollowTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('follow.followable_table', 'followables'), function (Blueprint $table) {
            $table->unsignedBigInteger(config('follow.users_table_foreign_key', 'user_id'));
            $table->unsignedInteger('followable_id');
            $table->string('followable_type')->index();
            $table->string('relation')->default('follow')->comment('follow/like/subscribe/favorite/upvote/downvote');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop(config('follow.followable_table', 'followables'));
    }
}
