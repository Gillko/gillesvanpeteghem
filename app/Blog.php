<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['blog_title', 'blog_description', 'blog_created', 'blog_modified'];

	protected $table ='blogs';

	protected $primaryKey = 'blog_id';

	public $timestamps = false;

	/**
	* A blog belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	* Get the tags associated with the given blog.
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'blogs_tags', 'blog_id', 'tag_id');
	}

	/**
	*Get a list of tag ids associated with the current blog.
	*
	*@return array
	*/
	public function getTagListAttribute()
	{
		return $this->tags->lists('tag_id')->all();
	}
}