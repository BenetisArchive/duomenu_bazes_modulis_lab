@extends('layouts.master')

@section("content")
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'imokos')) }}

	<div class="form-group">
		{{ Form::label('suma', 'Suma') }}
		{{ Form::text('suma', Input::old('suma'), array('class' => 'form-control'))  }}
		{{ Form::label('imoketa', 'Imoketa') }}
		{{ Form::text('imoketa', Input::old('imoketa'), array('class' => 'form-control'))  }}
		{{ Form::label('paskirtis', 'Paskirtis') }}
		{{ Form::text('paskirtis', Input::old('paskirtis'), array('class' => 'form-control'))  }}
	</div>

	{{ Form::submit('Sukurti imoka', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop