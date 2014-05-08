@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

<h1>Editing {{ $savininkas->vardas }} </h1>

{{ Form::model($savininkas,
	array('route' => array('savininkai.update', $savininkas->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('vardas', 'Vardas') }}
		{{ Form::text('vardas', null, array('class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('pavarde', 'Pavarde') }}
		{{ Form::text('pavarde', null, array('class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('asmens_kodas', 'Asmens kodas') }}
		{{ Form::text('asmens_kodas', null, array('class' => 'form-control'))  }}
	</div>

	<div class="form-group">
		{{ Form::label('lytis', 'Lytis') }}
		{{ Form::select('lytis', array('0' => 'Pasirinkite lyti', '1' => 'Vyras', '2' => 'Moteris', '3' => 'Kita'), null, array('class' => 'form-control'))  }}
	</div>


	{{ Form::submit('Issaugoti savininka', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop