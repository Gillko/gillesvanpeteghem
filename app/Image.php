<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $fillable = [];

	protected $table ='images';

	protected $primaryKey = 'image_id';

	public $timestamps = false;

	public function section()
    {
        return $this->belongsTo('App\Section');
    }

}
