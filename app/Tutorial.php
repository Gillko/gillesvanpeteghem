<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model {

	protected $fillable = [];

	protected $table ='tutorials';

	protected $primaryKey = 'tutorial_id';

	public $timestamps = false;

	public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
