@extends('layout')
@section('content')
{!! Form::model($movie, ['method'=>'PATCH', 'action' => ['MoviesController@update', $movie->id]]) !!}
{!! Form::label('name','Name:') !!}
{!! Form::text('name') !!}
<br>
{!! Form::label('name','Description:') !!}
{!! Form::text('description') !!}
<br>
{!! Form::label('name','Category:') !!}
{!! Form::select('category', ['Drama' => 'Drama', 'Comedia' => 'Comedia', 'Terror' => 'Terror'], 'Drama') !!}
<br><br>
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
@stop