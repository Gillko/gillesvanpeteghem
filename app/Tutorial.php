<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Carbon\Carbon;

class Tutorial extends Model
{

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['tutorial_title', 'tutorial_description', 'tutorial_created', 'tutorial_modified', 'tutorial_active'];

	protected $table ='tutorials';

	protected $primaryKey = 'tutorial_id';

	public $timestamps = false;

	/**
	* A tutorial belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	*Get the tags associated with the given tutorial.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'tags_tutorials', 'tutorial_id', 'tag_id');
	}

	/**
	*Get the images associated with the given tutorial.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function images()
	{
		return $this->belongsToMany('App\Image', 'images_tutorials', 'tutorial_id', 'image_id');
	}

	/**
	*Get a list of tag ids associated with the current tutorial.
	*
	*@return array
	*/
	public function getTagListAttribute()
	{
		return $this->tags->lists('tag_id')->all();
	}

	/**
	*Get a list of image ids associated with the current tutorial.
	*
	*@return array
	*/
	public function getImageListAttribute()
	{
		return $this->images->lists('image_id')->all();
	}

	/*public function getTutorialCreatedAttribute()
	{
	    return Carbon::parse($this->attributes['tutorial_created']);
	}

	public function getTutorialModifiedAttribute()
	{
	    return Carbon::parse($this->attributes['tutorial_modified']);
	}*/
}