<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	 protected $fillable = ['user_firstname', 'user_surname', 'user_username', 'email', 'password'];

	protected $table ='users';

	protected $primaryKey = 'user_id';

	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	* A user has many tags
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function tags()
	{
		return $this->hasMany('App\Tag');
	}

	/**
	* A user has many bookmarks
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function bookmarks()
	{
		return $this->hasMany('App\Bookmark');
	}

	/**
	* A user has many tutorials
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function tutorials()
	{
		return $this->hasMany('App\Tutorial');
	}

	/**
	* A user has many videos
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function videos()
	{
		return $this->hasMany('App\Video');
	}

	/**
	* A user has many blogs
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function blogs()
	{
		return $this->hasMany('App\Blog');
	}

	/**
	* A user has many projects
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function projects()
	{
		return $this->hasMany('App\Project');
	}

	/**
	* A user has many todos
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function todos()
	{
		return $this->hasMany('App\Todo');
	}

	/**
	* A user has many diaries
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function diaries()
	{
		return $this->hasMany('App\Diary');
	}

	/**
	* A user has many items
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function items()
	{
		return $this->hasMany('App\Item');
	}

	/**
	* A user has many images
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function images()
	{
		return $this->hasMany('App\Image');
	}
}