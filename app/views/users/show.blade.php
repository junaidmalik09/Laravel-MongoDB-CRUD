@extends('master')

@section('container')
<h1>Showing {{ $user->uid }}</h1>

	<div class="jumbotron text-left">
		<h2>{{ $user->uid }}</h2>
		<p>
			<strong>Networks:</strong><br>
			@foreach ($user->networks as $network)
				{{ $network['nid'] }}
				{{ $network['n_name'] }}
				{{ $network['n_ip'] }}
				{{ $network['n_status'] }}
				<br>
			@endforeach
			<br><strong>Hostnames:</strong> <br>
			@foreach ($user->hostnames as $hostname)
				{{ $hostname['hostname'] }}
				{{ $hostname['block'] }}
				<br>
			@endforeach
		</p>
	</div>
@stop