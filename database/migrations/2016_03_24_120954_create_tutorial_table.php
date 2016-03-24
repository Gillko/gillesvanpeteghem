<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTutorialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutorial', function(Blueprint $table)
		{
			$table->integer('tutorial_id');
			$table->string('tutorial_title');
			$table->text('tutorial_description', 65535);
			$table->string('tutorial_url')->nullable();
			$table->timestamp('tutorial_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('tutorial_modified')->nullable();
			$table->integer('category_id');
			$table->integer('type_id');
			$table->primary(['tutorial_id','category_id','type_id']);
			$table->index(['category_id','type_id'], 'fk_proglang_categories1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tutorial');
	}

}
