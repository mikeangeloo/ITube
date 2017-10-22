<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('facebook_id')->nullable();
			$table->string('name', 50);
			$table->string('lastname', 50)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('password');
			$table->string('image', 100)->nullable();
			$table->string('role', 10)->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
