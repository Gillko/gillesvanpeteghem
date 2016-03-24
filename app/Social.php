<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model {

	protected $fillable = [];

	protected $table ='socials';

	protected $primaryKey = 'social_id';

	public $timestamps = false;

}
