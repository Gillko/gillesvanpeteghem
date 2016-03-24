<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookmarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookmarks', function(Blueprint $table)
		{
			$table->integer('bookmark_id');
			$table->string('bookmark_title', 45);
			$table->string('bookmark_url');
			$table->string('bookmark_image')->nullable();
			$table->timestamp('bookmark_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('bookmark_modified')->nullable();
			$table->integer('category_id');
			$table->integer('type_id');
			$table->integer('subcategory_id')->nullable()->index('fk_bookmarks_subcategories1_idx');
			$table->primary(['bookmark_id','category_id','type_id']);
			$table->index(['category_id','type_id'], 'fk_bookmarks_categories1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bookmarks');
	}

}
