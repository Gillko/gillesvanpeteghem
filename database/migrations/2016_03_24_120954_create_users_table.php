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
			$table->integer('user_id')->primary();
			$table->string('user_firstname');
			$table->string('user_surname');
			$table->string('user_username')->unique('user_username_UNIQUE');
			$table->string('email')->unique('user_email_UNIQUE');
			$table->string('password');
			$table->timestamp('user_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('user_modified')->nullable();
			$table->dateTime('user_lastlogin')->nullable();
			$table->dateTime('user_locked')->nullable();
			$table->dateTime('user_confirmed')->nullable();
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
