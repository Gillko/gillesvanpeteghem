<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->integer('category_id');
			$table->string('category_title', 45);
			$table->text('category_description', 65535);
			$table->timestamp('category_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('category_modified')->nullable();
			$table->integer('type_id')->index('fk_categories_types1_idx');
			$table->primary(['category_id','type_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
