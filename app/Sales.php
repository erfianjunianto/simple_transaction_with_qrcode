<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use SoftDeletes;
	
	protected $table = 'sales';
	
	protected $hidden = [];

	protected $guarded = [];

	protected $dates = ['deleted_at']; 

	public static $rules = array(
		'nama_sales' 	=> 'required|min:5|max:30',
		'kode_sales' 	=> 'required|min:3|max:3'
	);

	public static function validate($data){

		return \Validator::make($data, static::$rules);

	}
}
