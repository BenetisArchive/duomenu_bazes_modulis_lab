@extends('layouts.master')

@section("content")
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<a class="btn btn-small btn-primary"
	href="{{ URL::to('tech_apziura/create') }}">Sukurti tech apziura</a>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>Id</td>
				<td>Technines apziuros data</td>
				<td>Komentarai</td>
				<td>Galioja</td>
				<td>Technine apziura galioja iki</td>
				<td>Auto valstybiniai numeriai</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
		@foreach($tech_apziura as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->tech_apziuros_data }}</td>
				<td>{{ $value->komentarai }}</td>
				<td>{{ $value->atlikta }}</td>
				<td>{{ $value->tech_apziura_galioja_iki }}</td>
				<td>{{ $value->get_valst_nr() }}</td>
				<td>
					<a class="btn btn-small btn-info" href="{{ URL::to('tech_apziura/' . $value->id . '/edit') }}">Edit</a>
					<a class="btn btn-small btn-info" href="{{ URL::to('tech_apziura/' . $value->id ) }}">Show</a>
					{{ Form::open(array('url' => 'tech_apziura/' . $value->id, 'class' => 'left')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
					{{ Form::close() }}

				</td>


			</tr>
		@endforeach
		</tbody>
	</table>
@stop
