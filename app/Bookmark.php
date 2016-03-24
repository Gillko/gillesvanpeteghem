<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {

	protected $fillable = [];

	protected $table ='bookmarks';

	protected $primaryKey = 'bookmark_id';

	public $timestamps = false;

	public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

}
