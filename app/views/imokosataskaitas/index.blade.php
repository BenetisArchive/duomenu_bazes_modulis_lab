@extends('layouts.master')

@section("content")
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{{ Form::open(array('url' => 'imokosataskaita', 'method' => 'GET')) }}


	<div class="form-group">
		{{ Form::label('date', 'Pasirinkti data nuo') }}
		{{ Form::text('date', null , array('class' => 'form-control'))  }}
	</div>

	{{ Form::submit('Filtruoti', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Suma</td>
			<td>Imoketa</td>
		</tr>
	</thead>
	<tbody>
	@foreach($imoku_ataskaita as $key => $imoka)
		<tr>
			<td>{{ $imoka->suma }}</td>
			<td>{{ $imoka->imoketa }}</td>

		</tr>
	@endforeach
	</tbody>
</table>
@stop
