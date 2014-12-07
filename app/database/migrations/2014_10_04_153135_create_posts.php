<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id', true);
			$table->unsignedInteger('user_id');
			$table->string('title', 100);
			$table->text('body');
			$table->timestamps();
			$table->dateTime('time_created');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("posts");
	}

}
