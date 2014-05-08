@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'tech_apziura')) }}

	<div class="form-group">
		{{ Form::label('automobilis', 'Automobilis valstybiniai nr') }}
		{{ Form::select('automobilis', $registruoti_auto , Input::old('automobilis'), array('class' => 'form-control'))  }}
		{{ Form::label('tech_apziuros_data', 'Technines apziuros data') }}
		{{ Form::text('tech_apziuros_data', Input::old('tech_apziuros_data'), array('class' => 'form-control'))  }}
		{{ Form::label('komentarai', 'Komentarai') }}
		{{ Form::text('komentarai', Input::old('komentarai'), array('class' => 'form-control'))  }}
		{{ Form::label('tech_apziura_galioja_iki', 'Tech apziura galioja iki') }}
		{{ Form::text('tech_apziura_galioja_iki', Input::old('tech_apziura_galioja_iki'), array('class' => 'form-control'))  }}
		{{ Form::label('atlikta', 'Galiojanti tech apziura') }}
		{{ Form::checkbox('atlikta', Input::old('atlikta'), array('class' => 'form-control'))  }}
	</div>
	{{ Form::submit('Sukurti tech apziura', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop