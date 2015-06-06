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

	public function likes(){
		return $this->hasMany('App\Like');
	}

	public function liked(User $user){
		$count = Like::where('user_id',$user->id)->where('review_id', $this->id)->count();
		return ($count > 0);
	}

	public function userLike(User $user){
		$like = Like::where('user_id',$user->id)->where('review_id', $this->id)->first();
		return $like;
	}

}
