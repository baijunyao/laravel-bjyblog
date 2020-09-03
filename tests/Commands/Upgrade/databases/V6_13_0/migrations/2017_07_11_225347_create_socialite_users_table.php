<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\Databases\V6_13_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialiteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('oauth_users') && !Schema::hasTable('socialite_users')) {
            Schema::create('socialite_users', function (Blueprint $table) {
                $table->increments('id')->comment('主键id');
                $table->boolean('socialite_client_id')->default(1)->comment('类型 1：QQ  2：新浪微博 3：github');
                $table->string('name', 30)->default('')->comment('第三方昵称');
                $table->string('avatar')->default('')->comment('头像');
                $table->string('openid', 40)->default('')->comment('第三方用户id');
                $table->string('access_token')->default('')->comment('access_token token');
                $table->string('last_login_ip', 16)->default('')->comment('最后登录ip');
                $table->integer('login_times')->unsigned()->default(0)->comment('登录次数');
                $table->string('email')->default('')->comment('邮箱');
                $table->boolean('is_admin')->default(0)->comment('是否是admin');
                $table->rememberToken();
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
        Schema::dropIfExists('socialite_users');
    }
}
