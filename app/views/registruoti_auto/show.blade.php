@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

{{ Form::model($registruoti_auto,
	array('route' => array('registruoti_auto.update', $registruoti_auto->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('automodelis', 'Automodelis') }}
		{{ Form::text('automodelis', $registruoti_auto->automodelis->modelis , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('savininkas', 'Savininkas') }}
		{{ Form::text('savininkas', $registruoti_auto->savininkas->vardas , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('valst_nr', 'Valstybiniai numeriai') }}
		{{ Form::text('valst_nr', null , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('kebulo_nr', 'Kebulo numeris') }}
		{{ Form::text('kebulo_nr', null , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('iregistruota', 'Iregistruota') }}
		{{ Form::text('iregistruota', null , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('auto_rusis', 'Automobilio rusis') }}
		{{ Form::text('auto_rusis', $registruoti_auto->auto_rusis, array('disabled', 'class' => 'form-control'))  }}
	</div>

{{ Form::close() }}
@stop