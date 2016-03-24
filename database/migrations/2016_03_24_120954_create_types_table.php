<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('types', function(Blueprint $table)
		{
			$table->integer('type_id')->primary();
			$table->string('type_title', 45);
			$table->text('type_description', 65535);
			$table->timestamp('type_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('type_modified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('types');
	}

}
