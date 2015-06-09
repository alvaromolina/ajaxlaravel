{{$review->content}}
<br>
<b>Por:</b>{{$review->user->name}}
<br>
<b>Likes:</b> {{$review->likes()->count()}}
@if ($review->liked(Auth::user()))
	{!! Form::open(array('route' => array('likes.destroy', $review->userLike(Auth::user())->id), 'method' => 'delete')) !!}
	<button type="submit" class="btn btn-danger btn-mini">Unlike</button>
	{!! Form::close() !!}
@else
{!! Form::open(['url'=>'likes']) !!}
<br>
{!! Form::hidden('review_id',$review->id) !!}
<br><br>
{!! Form::submit('Like') !!}
{!! Form::close() !!}
@endif
