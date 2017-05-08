<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toko extends Model
{
	use SoftDeletes;
	
	protected $table = 'toko';
	
	protected $hidden = [];

	protected $guarded = [];

	protected $dates = ['deleted_at']; 

	public static $rules = array(
		'nama_toko' 	=> 'required|min:5|max:30',
		'alamat_toko' 	=> 'required|min:10'
	);

	public static function validate($data){

		return \Validator::make($data, static::$rules);

	}

}
