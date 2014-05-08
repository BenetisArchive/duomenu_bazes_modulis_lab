@extends('layouts.master')

@section("content")
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a class="btn btn-small btn-primary"
href="{{ URL::to('registruoti_auto/create') }}">Registruoti automobili</a>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Id</td>
			<td>Modelis</td>
			<td>Gamintojas</td>
			<td>Savininko vardas</td>
			<td>Savininko pavarde</td>
			<td>Valstybiniai nr</td>
			<td>Kebulo nr</td>
			<td>Iregistruota</td>
			<td>Auto rusis</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($registruoti_auto as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->automodelis->modelis }}</td>
			<td>{{ $value->automodelis->gamintojas->pavadinimas }}</td>
			<td>{{ $value->savininkas->vardas }}</td>
			<td>{{ $value->savininkas->pavarde }}</td>
			<td>{{ $value->valst_nr }}</td>
			<td>{{ $value->kebulo_nr }}</td>
			<td>{{ $value->iregistruota }}</td>
			<td>{{ $value->auto_rusis }}</td>
			<td>
				<a class="btn btn-small btn-info" href="{{ URL::to('registruoti_auto/' . $value->id . '/edit') }}">Edit</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('registruoti_auto/' . $value->id) }}">Show</a>
				{{ Form::open(array('url' => 'registruoti_auto/' . $value->id, 'class' => 'left')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

			</td>


		</tr>
	@endforeach
	</tbody>
</table>
@stop
