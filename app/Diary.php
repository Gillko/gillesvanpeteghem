<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['diary_title', 'diary_description', 'diary_created', 'diary_modified'];

	protected $table ='diaries';

	protected $primaryKey = 'diary_id';

	public $timestamps = false;

	/**
	* A diary belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	*Get the tags associated with the given diary.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'diaries_tags', 'diary_id', 'tag_id');
	}

	/**
	*Get a list of tag ids associated with the current diary.
	*
	*@return array
	*/
	public function getTagListAttribute()
	{
		return $this->tags->lists('tag_id')->all();
	}
}