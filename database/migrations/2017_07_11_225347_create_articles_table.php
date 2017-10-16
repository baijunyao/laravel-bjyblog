<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id')->comment('文章表主键');
			$table->boolean('category_id')->default(0)->comment('分类id');
			$table->char('title', 100)->default('')->comment('标题');
			$table->string('author', 15)->default('')->comment('作者');
			$table->text('markdown', 16777215)->comment('markdown文章内容');
			$table->text('html', 16777215)->comment('markdown转的html页面');
			$table->char('description')->default('')->comment('描述');
			$table->string('keywords')->default('')->comment('关键词');
			$table->string('cover')->default('')->comment('封面图');
			$table->boolean('is_top')->default(0)->comment('是否置顶 1是 0否');
			$table->integer('click')->unsigned()->default(0)->comment('点击数');
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
		Schema::dropIfExists('articles');
	}

}
