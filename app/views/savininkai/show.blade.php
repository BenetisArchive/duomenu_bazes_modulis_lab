@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

<h1>Viewing {{ $savininkas->vardas }} </h1>

{{ Form::model($savininkas,
	array('route' => array('savininkai.update', $savininkas->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('vardas', 'Vardas') }}
		{{ Form::text('vardas', null, array('disabled','class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('pavarde', 'Pavarde') }}
		{{ Form::text('pavarde', null, array('disabled','class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('asmens_kodas', 'Asmens kodas') }}
		{{ Form::text('asmens_kodas', null, array('disabled', 'class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('lytis', 'Lytis') }}
		{{ Form::text('lytis', $savininkas->lytis, array('disabled', 'class' => 'form-control'))  }}
	</div>

{{ Form::close() }}
@stop