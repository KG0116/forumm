<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id', true);
			$table->string('fname', 30);
			$table->string('lname', 30);
			$table->string('username', 30);
			$table->string('email', 30);
			$table->string('password', 64);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->dateTime('time_created');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("users");
	}

}
