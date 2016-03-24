<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookmarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bookmarks', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_bookmarks_categories1')->references('category_id')->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('subcategory_id', 'fk_bookmarks_subcategories1')->references('subcategory_id')->on('subcategories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bookmarks', function(Blueprint $table)
		{
			$table->dropForeign('fk_bookmarks_categories1');
			$table->dropForeign('fk_bookmarks_subcategories1');
		});
	}

}
