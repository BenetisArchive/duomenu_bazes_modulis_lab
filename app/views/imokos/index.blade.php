@extends('layouts.master')

@section("content")
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Id</td>
			<td>Suma</td>
			<td>Imokos data</td>
			<td>Paskirtis</td>
			<!-- <td></td> -->
		</tr>
	</thead>
	<tbody>
	@foreach($imokos as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->suma }}</td>
			<td>{{ $value->imoketa }}</td>
			<td>{{ $value->paskirtis }}</td>
<!-- 			<td>
				<a class="btn btn-small btn-info" href="{{ URL::to('imokos/' . $value->id . '/edit') }}">Edit</a>
				{{ Form::open(array('url' => 'imokos/' . $value->id, 'class' => 'left')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

			</td> -->


		</tr>
	@endforeach
	</tbody>
</table>
@stop
