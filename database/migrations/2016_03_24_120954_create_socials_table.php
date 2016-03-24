<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('socials', function(Blueprint $table)
		{
			$table->integer('social_id')->primary();
			$table->string('social_title', 45);
			$table->text('social_description', 65535);
			$table->string('social_icon');
			$table->string('social_url');
			$table->timestamp('social_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('social_modified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('socials');
	}

}
