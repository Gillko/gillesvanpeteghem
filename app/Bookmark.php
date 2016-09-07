<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['bookmark_title', 'bookmark_description', 'bookmark_url', 'bookmark_created', 'bookmark_modified'];

	protected $table ='bookmarks';

	protected $primaryKey = 'bookmark_id';

	public $timestamps = false;

	/**
	* A bookmark belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	*Get the tags associated with the given bookmark.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'bookmarks_tags', 'bookmark_id', 'tag_id');
	}

	/**
	*Get the images associated with the given bookmark.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function images()
	{
		return $this->belongsToMany('App\Image', 'bookmarks_images', 'bookmark_id', 'image_id');
	}

	/**
	*Get a list of tag ids associated with the current bookmark.
	*
	*@return array
	*/
	public function getTagListAttribute()
	{
		return $this->tags->lists('tag_id')->all();
	}

	/**
	*Get a list of image ids associated with the current bookmark.
	*
	*@return array
	*/
	public function getImageListAttribute()
	{
		return $this->images->lists('image_id')->all();
	}
}