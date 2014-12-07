<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id', true);
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('post_id');
			$table->text('comment');
			$table->timestamps();
			$table->dateTime('time_created');
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("comments");
	}

}
