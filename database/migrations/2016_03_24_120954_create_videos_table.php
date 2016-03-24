<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table)
		{
			$table->integer('video_id');
			$table->string('video_url');
			$table->timestamp('video_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('video_modified')->nullable();
			$table->integer('category_id');
			$table->integer('type_id');
			$table->primary(['video_id','category_id','type_id']);
			$table->index(['category_id','type_id'], 'fk_videos_categories1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('videos');
	}

}
