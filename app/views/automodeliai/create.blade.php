@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'automodeliai')) }}

	<div class="form-group">
		{{ Form::label('modelis', 'Modelis') }}
		{{ Form::text('modelis', Input::old('modelis'), array('class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('gamintojas', 'gamintojas') }}
		{{ Form::select('gamintojas', $gamintojai , Input::old('gamintojas'), array('class' => 'form-control'))  }}
	</div>

	{{ Form::submit('Sukurti modeli', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop