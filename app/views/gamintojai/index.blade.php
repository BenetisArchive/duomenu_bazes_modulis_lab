@extends('layouts.master')

@section("content")
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a class="btn btn-small btn-primary"
href="{{ URL::to('gamintojai/create') }}">Sukurti gamintoja</a>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Id</td>
			<td>Pavadinimas</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($gamintojai as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->pavadinimas }}</td>
			<td>
				<a class="btn btn-small btn-info" href="{{ URL::to('gamintojai/' . $value->id . '/edit') }}">Edit</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('gamintojai/' . $value->id ) }}">Show</a>
				{{ Form::open(array('url' => 'gamintojai/' . $value->id, 'class' => 'left')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

			</td>


		</tr>
	@endforeach
	</tbody>
</table>
@stop
