@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

<h1>Editing {{ $gamintojas->pavadinimas }} </h1>

{{ Form::model($gamintojas,
	array('route' => array('gamintojai.update', $gamintojas->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('pavadinimas', 'Pavadinimas') }}
		{{ Form::text('pavadinimas', null, array('class' => 'form-control'))  }}
	</div>

	{{ Form::submit('Issaugoti gamintoja', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop