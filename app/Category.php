<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = [];

	protected $table ='categories';

	protected $primaryKey = 'category_id';

	public $timestamps = false;

	public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function tutorials()
    {
        return $this->hasMany('App\Tutorial');
    }

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
