@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'gamintojai')) }}

	<div class="form-group">
		{{ Form::label('pavadinimas', 'Pavadinimas') }}
		{{ Form::text('pavadinimas', Input::old('pavadinimas'), array('class' => 'form-control'))  }}
	</div>

	{{ Form::submit('Sukurti gamintoja', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop