@extends('layout')
@section('content')
{!! Form::open(['url'=>'movies']) !!}
{!! Form::label('name','Name:') !!}
{!! Form::text('name') !!}
<br>
{!! Form::label('name','Description:') !!}
{!! Form::textarea('description') !!}
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