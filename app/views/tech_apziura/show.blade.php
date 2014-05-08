@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}

{{ Form::model($tech_apziura,
	array('route' => array('tech_apziura.update', $tech_apziura->id), 'method' => 'PUT')) }}
	<h3>Technine apziura</h3>
	<div class="form-group">
		{{ Form::label('automobilis', 'Automobilis valstybiniai nr') }}
		{{ Form::text('automobilis', $tech_apziura->get_valst_nr() , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('tech_apziuros_data', 'Technines apziuros data') }}
		{{ Form::text('tech_apziuros_data', null , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('komentarai', 'Komentarai') }}
		{{ Form::text('komentarai', null , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('tech_apziura_galioja_iki', 'Tech apziura galioja iki') }}
		{{ Form::text('tech_apziura_galioja_iki', null , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('atlikta', 'Galiojanti tech apziura') }}
		{{ Form::text('atlikta', $tech_apziura->atlikta ? 'Taip' : 'Ne' , array('disabled', 'class' => 'form-control'))  }}
	</div>

	@if($savininkas != null)
		<h3>Savininkas</h3>
		<div class="form-group">
			{{ Form::label('vardas', 'Vardas') }}
			{{ Form::text('vardas', $savininkas->vardas, array('disabled','class' => 'form-control'))  }}
			{{ Form::label('pavarde', 'Pavarde') }}
			{{ Form::text('pavarde', $savininkas->pavarde, array('disabled','class' => 'form-control'))  }}
			{{ Form::label('asmens_kodas', 'Asmens kodas') }}
			{{ Form::text('asmens_kodas', $savininkas->asmens_kodas, array('disabled', 'class' => 'form-control'))  }}
			{{ Form::label('lytis', 'Lytis') }}
			{{ Form::text('lytis', $savininkas->lytis, array('disabled', 'class' => 'form-control'))  }}
		</div>
	@else
		<h3>Savininko nera</h3>
	@endif
	<h3>Automobilis</h3>
	<div class="form-group">
		{{ Form::label('automodelis', 'Automodelis') }}
		{{ Form::text('automodelis', $auto->automodelis->modelis , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('gamintojas', 'Gamintojas') }}
		{{ Form::text('gamintojas', $auto->automodelis->gamintojas->pavadinimas , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('valst_nr', 'Valstybiniai numeriai') }}
		{{ Form::text('valst_nr', $auto->valst_nr , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('kebulo_nr', 'Kebulo numeris') }}
		{{ Form::text('kebulo_nr', $auto->kebulo_nr , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('iregistruota', 'Iregistruota') }}
		{{ Form::text('iregistruota', $auto->iregistruota , array('disabled', 'class' => 'form-control'))  }}
		{{ Form::label('auto_rusis', 'Automobilio rusis') }}
		{{ Form::text('auto_rusis', $auto->auto_rusis, array('disabled', 'class' => 'form-control'))  }}
	</div>

{{ Form::close() }}

@stop