@extends('master')

@section('container')
<h1>Showing {{ $user->uid }}</h1>

	<div class="text-left">
		<h2>{{ $user->uid }}</h2>
		<p>
			<strong>Networks:</strong>
			<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>Network ID</td>
					<td>Network Name</td>
					<td>Network IP</td>
					<td>Network Status</td>
				</tr>
			</thead>
			<tbody>
			
			@foreach ($user->networks as $network)
			<tr>
				<td>{{ $network['nid'] }}</td>
				<td>{{ $network['n_name'] }}</td>
				<td>{{ $network['n_ip'] }}</td>
				<td>{{ $network['n_status'] }}</td>
			</tr>	
			@endforeach
			
			</tbody>
			</table>

			<br><strong>Hostnames:</strong> <br>
			<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>Hostname</td>
					<td>Block</td>
					
				</tr>
			</thead>
			<tbody>
			@foreach ($user->hostnames as $hostname)
			<tr>
				<td>{{ $hostname['hostname'] }}</td>
				<td>{{ $hostname['block'] }}</td>
			</tr>
			@endforeach
			</tbody>
			</table>

		</p>
	</div>
@stop