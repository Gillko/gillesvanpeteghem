<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subcategories', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_subcategories_categories1')->references('category_id')->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subcategories', function(Blueprint $table)
		{
			$table->dropForeign('fk_subcategories_categories1');
		});
	}

}
