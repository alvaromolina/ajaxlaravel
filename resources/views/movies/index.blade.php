Vista de movies:
@extends('layout')
@section('content')
	<h1>Movies</h1>
	@foreach ($movies as $movie)
		<h2><a href="/movies/{{$movie->id}}">{{$movie->name}}</a></h2>
		<p>{{$movie->description}}</p>
		<a href="/movies/{{$movie->id}}/edit">Editar</a>
		{!! Form::open(array('route' => array('movies.destroy', $movie->id), 'method' => 'delete')) !!}
		<button type="submit" class="btn btn-danger btn-mini">Borrar</button>
		{!! Form::close() !!}
	@endforeach

	<a href="/movies/create">Nuevo</a>

@stop