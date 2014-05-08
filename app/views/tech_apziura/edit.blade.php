@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}

{{ Form::model($tech_apziura,
	array('route' => array('tech_apziura.update', $tech_apziura->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('automobilis', 'Automobilis valstybiniai nr') }}
		{{ Form::select('automobilis', $registruoti_auto , $tech_apziura->auto_id , array('class' => 'form-control'))  }}
		{{ Form::label('tech_apziuros_data', 'Technines apziuros data') }}
		{{ Form::text('tech_apziuros_data', null , array('class' => 'form-control'))  }}
		{{ Form::label('komentarai', 'Komentarai') }}
		{{ Form::text('komentarai', null , array('class' => 'form-control'))  }}
		{{ Form::label('tech_apziura_galioja_iki', 'Tech apziura galioja iki') }}
		{{ Form::text('tech_apziura_galioja_iki', null , array('class' => 'form-control'))  }}
		{{ Form::label('atlikta', 'Galiojanti tech apziura') }}
		{{ Form::checkbox('atlikta', null , array('class' => 'form-control'))  }}
	</div>
	{{ Form::submit('Issaugoti tech apziura', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop