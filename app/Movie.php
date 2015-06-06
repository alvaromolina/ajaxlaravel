<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

	protected $fillable = ['name', 'description'];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function reviews(){
		return $this->hasMany('App\Review');
	}

	public function ratings(){
		return $this->hasMany('App\Rating');
	}

	public function averageRating(){
		return $this->ratings()->avg('value');
	}

}
