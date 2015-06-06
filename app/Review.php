<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

	protected $fillable = ['content', 'movie_id'];

	public function user(){
		return $this->belongsTo('App\User');
	}


	public function movie(){
		return $this->belongsTo('App\Movie');
	}


}
