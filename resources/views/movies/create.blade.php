@extends('layout')
@section('content')
{!! Form::open(['url'=>'movies', 'files'=>true ]) !!}
{!! Form::label('name','Name:') !!}
{!! Form::text('name') !!}
<br>
{!! Form::label('name','Description:') !!}
{!! Form::textarea('description') !!}
<br>
{!! Form::label('name','Category:') !!}
{!! Form::select('category', ['Drama' => 'Drama', 'Comedia' => 'Comedia', 'Terror' => 'Terror'], 'Drama') !!}
<br>
{!! Form::label('name','Imagen:') !!}
{!! Form::file('image') !!}

<br>
<br>
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}

@if ($errors->any())
	@foreach($errors -> all() as $error)
		<br>
		{{$error}}
	@endforeach
@endif
@stop