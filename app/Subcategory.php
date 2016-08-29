<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model {

	protected $fillable = [];

	protected $table ='subcategories';

	protected $primaryKey = 'subcategory_id';

	public $timestamps = false;

	public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
