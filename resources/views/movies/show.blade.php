@extends('layout')
@section('content')
	<h2>{{$movie->name}}</h2>
	<img src="{{ ($movie->image == null) ? '/uploads/15707.jpg' : $movie->image}}" alt="">
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
	<div id="reviews">
	@foreach ($movie->reviews as $review)
		@include ('reviews.show', ['review' => $review])
	@endforeach
	</div>
	{!! Form::open(['url'=>'reviews', 'class' => 'reviewForm']) !!}
	<br>
	{!! Form::label('name','Comentario:') !!}
	{!! Form::text('content', '' , ['id' => 'contenido']) !!}
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

	<script>

		$(document).ready( function( ) {
		    $( '.reviewForm' ).on( 'submit', function(e) {
		        e.preventDefault();

		        var content = $(this).find('input[name=content]').val();
        		var movie_id = $(this).find('input[name=movie_id]').val();
  
		   		$.ajax({
		            type: "POST",
		            url: '/reviews',
		            data: {content: content, movie_id: movie_id},
		            success: function( review ) {
		            	$('#reviews').append(review);
		            	//alert(review.content);
		            }
		        });


		    });
		});



	</script>

@stop