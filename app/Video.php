<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

	protected $fillable = [];

	protected $table ='videos';

	protected $primaryKey = 'video_id';

	public $timestamps = false;

	public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
