<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['image_title', 'image_description', 'image_url', 'image_type', 'image_created', 'image_modified'];

	protected $table ='images';

	protected $primaryKey = 'image_id';

	public $timestamps = false;

	/**
	* An image belongs to a user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	* An image can belong to a bookmark
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
    public function bookmark()
    {
        return $this->belongsTo('App\Bookmark', 'bookmark_id');
    }

    /**
	* An image can belong to a project
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

	/**
	*Get the tags associated with the given image.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'images_tags', 'image_id', 'tag_id');
	}

	/**
	*Get the tutorials associated with the given image.
	*
	*@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function tutorials()
	{
		return $this->belongsToMany('App\Tutorial', 'images_tutorials', 'image_id', 'tutorial_id');
	}

	/**
	*Get a list of tag ids associated with the current image.
	*
	*@return array
	*/
	public function getTagListAttribute()
	{
		return $this->tags->lists('tag_id')->all();
	}

	/**
	*Get a list of tutorial ids associated with the current image.
	*
	*@return array
	*/
	/*public function getTutorialListAttribute()
	{
		return $this->tutorials->lists('tutorial_id')->all();
	}*/
}