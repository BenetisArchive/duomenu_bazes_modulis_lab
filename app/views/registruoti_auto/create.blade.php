@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'registruoti_auto')) }}

	<div class="form-group">
		{{ Form::label('automodelis', 'Automodelis') }}
		{{ Form::select('automodelis', $automodeliai , Input::old('automodelis'), array('class' => 'form-control'))  }}
		{{ Form::label('savininkas', 'Savininkas') }}
		{{ Form::select('savininkas', $savininkai , Input::old('savininkas'), array('class' => 'form-control'))  }}
		{{ Form::label('valst_nr', 'Valstybiniai numeriai') }}
		{{ Form::text('valst_nr', Input::old('valst_nr'), array('class' => 'form-control'))  }}
		{{ Form::label('kebulo_nr', 'Kebulo numeris') }}
		{{ Form::text('kebulo_nr', Input::old('kebulo_nr'), array('class' => 'form-control'))  }}
		{{ Form::label('iregistruota', 'Iregistruota') }}
		{{ Form::text('iregistruota', Input::old('iregistruota'), array('class' => 'form-control'))  }}
		{{ Form::label('auto_rusis', 'Automobilio rusis') }}
		{{ Form::select('auto_rusis', array('lengvasis' => 'Lengvasis', 'krovininis' => 'Krovninins', 'keleivinis' => 'Keleivinis') , Input::old('auto_rusis') , array('class' => 'form-control'))  }}
	</div>
	{{ Form::submit('Sukurti gamintoja', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop