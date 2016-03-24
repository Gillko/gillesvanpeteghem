<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sections', function(Blueprint $table)
		{
			$table->integer('section_id')->primary();
			$table->string('section_title', 45);
			$table->text('section_description', 65535);
			$table->string('section_anchor', 45);
			$table->string('section_background', 45)->nullable();
			$table->timestamp('section_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('section_modified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sections');
	}

}
