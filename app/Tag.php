<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['tag_title', 'tag_description', 'tag_type', 'tag_created', 'tag_modified'];

	protected $table ='tags';

	protected $primaryKey = 'tag_id';

	public $timestamps = false;

	/**
	* A tag belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	*Get the bookmarks associated with the given tag.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function bookmarks()
	{
		return $this->belongsToMany('App\Bookmark', 'bookmarks_tags', 'bookmark_id', 'tag_id');
	}

	/**
	*Get the tutorials associated with the given tag.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tutorials()
	{
		return $this->belongsToMany('App\Tutorial', 'tags_tutorials');
	}

	/**
	*Get the videos associated with the given tag.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function videos()
	{
		return $this->belongsToMany('App\Video', 'tags_videos');
	}

	/**
	*Get the projects associated with the given tag.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function projects()
	{
		return $this->belongsToMany('App\Project', 'projects_tags');
	}

	/**
	*Get the diaries associated with the given tag.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function diaries()
	{
		return $this->belongsToMany('App\Diary', 'diaries_tags');
	}

	/**
	*Get the blogs associated with the given tag.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function blogs()
	{
		return $this->belongsToMany('App\Blog', 'blogs_tags');
	}

	/**
	*Get the todos associated with the given tag.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function todos()
	{
		return $this->belongsToMany('App\Todo', 'tags_todos');
	}

	/**
	*Get the images associated with the given tag.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function images()
	{
		return $this->belongsToMany('App\Type', 'images_tags');
	}
}