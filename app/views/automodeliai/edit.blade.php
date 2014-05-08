@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

<h1>Editing {{ $automodeliai->modelis }} </h1>

{{ Form::model($automodeliai,
	array('route' => array('automodeliai.update', $automodeliai->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('modelis', 'Modelis') }}
		{{ Form::text('modelis', null, array('class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('gamintojas', 'Gamintojas') }}
		{{ Form::select('gamintojas', $gamintojai , $automodeliai->gamintojo_id, array('class' => 'form-control'))  }}
	</div>

	{{ Form::submit('Issaugoti modeli', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop