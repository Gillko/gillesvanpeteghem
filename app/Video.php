<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['video_title', 'video_description', 'video_url', 'video_created', 'video_modified'];

	protected $table ='videos';

	protected $primaryKey = 'video_id';

	public $timestamps = false;

	/**
	* A video belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	*Get the tags associated with the given video.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'tags_videos');
	}

	/**
	*Get a list of tag ids associated with the current video.
	*
	*@return array
	*/
	public function getTagListAttribute()
	{
		return $this->tags->lists('tag_id')->all();
	}
}