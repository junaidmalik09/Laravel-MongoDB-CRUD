@extends('master')

@section('container')
<h1>Users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Networks</td>
			<td>Hostnames</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($users as $key => $value)
		<tr>
			<td>{{ $value->uid }}</td>
			<td>{{ count($value->networks) }}</td>
			<td>{{ count($value->hostnames) }}</td>
			
			<td>

				
				<!-- show the user (uses the show method found at GET /users/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->_id) }}">Show</a>

				<!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->_id . '/edit') }}">Edit</a>

				<!-- delete the users (uses the destroy method DESTROY /users/{id} -->
				{{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}


			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop