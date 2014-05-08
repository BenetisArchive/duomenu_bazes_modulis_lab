@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

<h1>Viewing {{ $gamintojas->pavadinimas }} </h1>

{{ Form::model($gamintojas,
	array('route' => array('gamintojai.update', $gamintojas->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('pavadinimas', 'Pavadinimas') }}
		{{ Form::text('pavadinimas', null, array('disabled', 'class' => 'form-control'))  }}
	</div>

{{ Form::close() }}
@stop