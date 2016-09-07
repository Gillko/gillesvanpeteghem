<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['project_title', 'project_description', 'project_url', 'project_created', 'project_modified'];

	protected $table ='projects';

	protected $primaryKey = 'project_id';

	public $timestamps = false;

	/**
	* A project belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the image record associated with the project.
	 */
	public function image()
	{
		return $this->hasOne('App\Image');
	}
	
	/**
	*Get the tags associated with the given project.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'projects_tags', 'project_id', 'tag_id');
	}

	/**
	*Get the images associated with the given project.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function images()
	{
		return $this->belongsToMany('App\Image', 'images_projects', 'project_id', 'image_id');
	}

	/**
	*Get a list of tag ids associated with the current project.
	*
	*@return array
	*/
	public function getTagListAttribute()
	{
		return $this->tags->lists('tag_id')->all();
	}

	/**
	*Get a list of image ids associated with the current project.
	*
	*@return array
	*/
	public function getImageListAttribute()
	{
		return $this->images->lists('image_id')->all();
	}
}