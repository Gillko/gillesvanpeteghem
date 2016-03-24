<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcategories', function(Blueprint $table)
		{
			$table->integer('subcategory_id')->primary();
			$table->string('subcategory_title', 45);
			$table->string('subcategory_description', 45);
			$table->timestamp('subcategory_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('subcategory_modified')->nullable();
			$table->integer('category_id');
			$table->integer('type_id');
			$table->index(['category_id','type_id'], 'fk_subcategories_categories1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subcategories');
	}

}
