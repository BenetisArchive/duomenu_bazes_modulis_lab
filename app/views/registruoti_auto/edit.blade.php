@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

{{ Form::model($registruoti_auto,
	array('route' => array('registruoti_auto.update', $registruoti_auto->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('automodelis', 'Automodelis') }}
		{{ Form::select('automodelis', $automodeliai , $registruoti_auto->modelio_id , array('class' => 'form-control'))  }}
		{{ Form::label('savininkas', 'Savininkas') }}
		{{ Form::select('savininkas', $savininkai , $registruoti_auto->savininko_id , array('class' => 'form-control'))  }}
		{{ Form::label('valst_nr', 'Valstybiniai numeriai') }}
		{{ Form::text('valst_nr', null , array('class' => 'form-control'))  }}
		{{ Form::label('kebulo_nr', 'Kebulo numeris') }}
		{{ Form::text('kebulo_nr', null , array('class' => 'form-control'))  }}
		{{ Form::label('iregistruota', 'Iregistruota') }}
		{{ Form::text('iregistruota', null , array('class' => 'form-control'))  }}
		{{ Form::label('auto_rusis', 'Automobilio rusis') }}
		{{ Form::select('auto_rusis', array('lengvasis' => 'Lengvasis', 'krovininis' => 'Krovninins', 'keleivinis' => 'Keleivinis') , $registruoti_auto->auto_rusis  , array('class' => 'form-control'))  }}
	</div>
	{{ Form::submit('Issaugoti gamintoja', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop