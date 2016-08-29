<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table ='users';

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function types()
    {
        return $this->hasMany('App\Type');
    }

    public function tutorials()
    {
        return $this->hasMany('App\Tutorial');
    }

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }
}
