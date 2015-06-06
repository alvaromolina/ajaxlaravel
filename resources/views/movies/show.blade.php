@extends('layout')
@section('content')
	<h2>{{$movie->name}}</h2>
	<h2><b>Categoria:</b>{{$movie->category}}</h2>
	<p>{{$movie->description}}</p>

	<h3>Rating: {{$movie->averageRating()}}</h3>
	{!! Form::open(['url'=>'ratings']) !!}
	<br>
	{!! Form::label('name','Rating:') !!}
	{!! Form::text('value') !!}
	{!! Form::hidden('movie_id',$movie->id) !!}
	<br><br>
	{!! Form::submit('Rate!') !!}
	{!! Form::close() !!}

	<h3>Reviews:</h3>
	@foreach ($movie->reviews as $review)
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
	@endforeach
	{!! Form::open(['url'=>'reviews']) !!}
	<br>
	{!! Form::label('name','Comentario:') !!}
	{!! Form::text('content') !!}
	{!! Form::hidden('movie_id',$movie->id) !!}
	<br><br>
	{!! Form::submit('Guardar') !!}
	{!! Form::close() !!}
	@if ($errors->any())
		@foreach($errors -> all() as $error)
			<br>
			{{$error}}
		@endforeach
	@endif
@stop