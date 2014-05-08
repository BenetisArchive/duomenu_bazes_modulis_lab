@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'savininkai')) }}

	<div class="form-group">
		{{ Form::label('vardas', 'Vardas') }}
		{{ Form::text('vardas', Input::old('vardas'), array('class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('pavarde', 'Pavarde') }}
		{{ Form::text('pavarde', Input::old('pavarde'), array('class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('asmens_kodas', 'Asmens kodas') }}
		{{ Form::text('asmens_kodas', Input::old('asmens_kodas'), array('class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('lytis', 'Lytis') }}
		{{ Form::select('lytis', array('0' => 'Pasirinkite lyti', '1' => 'Vyras', '2' => 'Moteris', '3' => 'Kita'), Input::old('lytis'), array('class' => 'form-control'))  }}
	</div>

	{{ Form::submit('Sukurti savininka', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop