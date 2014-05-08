@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

<h1>Viewing {{ $automodeliai->modelis }} </h1>

{{ Form::model($automodeliai,
	array('route' => array('automodeliai.update', $automodeliai->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('modelis', 'Modelis') }}
		{{ Form::text('modelis', null, array('class' => 'form-control', 'disabled'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('gamintojas', 'Gamintojas') }}
		{{ Form::text('gamintojas', $automodeliai->gamintojas->pavadinimas, array('class' => 'form-control', 'disabled'))  }}
	</div>

{{ Form::close() }}
@stop