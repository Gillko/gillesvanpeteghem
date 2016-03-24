<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	protected $fillable = [];

	protected $table ='sections';

	protected $primaryKey = 'section_id';

	public $timestamps = false;

	public function images()
    {
        return $this->hasMany('App\Image');
    }
}
