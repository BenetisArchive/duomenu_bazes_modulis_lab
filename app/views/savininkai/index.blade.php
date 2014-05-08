@extends('layouts.master')

@section("content")
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a class="btn btn-small btn-primary"
href="{{ URL::to('savininkai/create') }}">Sukurti savininka</a>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Id</td>
			<td>Vardas</td>
			<td>Pavarde</td>
			<td>Asmens kodas</td>
			<td>Lytis</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($savininkai as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->vardas }}</td>
			<td>{{ $value->pavarde }}</td>
			<td>{{ $value->asmens_kodas }}</td>
			<td>{{ $value->lytis }}</td>
			<td>
				<a class="btn btn-small btn-info" href="{{ URL::to('savininkai/' . $value->id . '/edit') }}">Edit</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('savininkai/' . $value->id ) }}">Show</a>
				{{ Form::open(array('url' => 'savininkai/' . $value->id, 'class' => 'left')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

			</td>


		</tr>
	@endforeach
	</tbody>
</table>
@stop
