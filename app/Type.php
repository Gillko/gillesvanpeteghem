<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

	protected $fillable = [];

	protected $table ='types';

	protected $primaryKey = 'type_id';

	public $timestamps = false;

	public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
