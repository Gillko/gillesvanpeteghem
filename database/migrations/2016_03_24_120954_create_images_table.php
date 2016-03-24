<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->integer('image_id')->primary();
			$table->string('image_title', 45);
			$table->string('image_description', 45)->nullable();
			$table->string('image_url');
			$table->timestamp('image_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('image_modified')->nullable();
			$table->integer('section_id')->index('fk_images_front1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
