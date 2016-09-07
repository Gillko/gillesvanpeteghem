<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['todo_title', 'todo_description', 'todo_created', 'todo_modified'];

	protected $table ='todos';

	protected $primaryKey = 'todo_id';

	public $timestamps = false;

	/**
	* A todo belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	 /**
	*Get the tags associated with the given todo.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'tags_todos', 'todo_id', 'tag_id');
	}

	/**
	*Get a list of tag ids associated with the current todo.
	*
	*@return array
	*/
	public function getTagListAttribute()
	{
		return $this->tags->lists('tag_id')->all();
	}
}