<?php

namespace Tests\Commands\Upgrade\V5_8_4_0\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOauthUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('oauth_users', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->boolean('oauth_client_id')->default(1)->comment('类型 1：QQ  2：新浪微博 3：github');
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('oauth_users');
    }
}
