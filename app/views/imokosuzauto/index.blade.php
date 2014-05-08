@extends('layouts.master')

@section("content")
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a class="btn btn-small btn-primary"
href="{{ URL::to('imokos_uz_auto/create') }}">Sukurti imoka uz auto</a>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Id</td>
			<td>Valstybiniai nr</td>
			<td>Imoka</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach($imokos_uz_auto as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->auto->valst_nr }}</td>
			<td>{{ $value->imoka->suma }}</td>
			<td>
				{{ Form::open(array('url' => 'imokos_uz_auto/' . $value->id, 'class' => 'left')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

			</td>


		</tr>
	@endforeach
	</tbody>
</table>
@stop
