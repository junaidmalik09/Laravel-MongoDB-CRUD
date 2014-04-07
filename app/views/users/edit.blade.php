@extends('master')

@section('container')
<h1>Editing {{$user->uid}}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT','class'=>'form_inline')) }}


	<div class="form-group">
		{{ Form::hidden('networkCount',1,array('class'=>'form-control','id'=>'networkCount'))}}
		{{ Form::label('uid', 'User ID') }}
		{{ Form::text('uid', $user->uid, array('class' => 'form-control','readonly'=>'readonly')) }}
	</div>
	<br/><br/>
	<div class="form-group" id="networkFields">
		
		{{ Form::label('networks', 'Networks') }}
		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_1', $user->networks[0]['nid'] , array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_1', $user->networks[0]['n_name'], array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_1', $user->networks[0]['n_ip'], array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_1', User::$networkDropDown, $user->networks[0]['n_status'], array('class' => 'form-control')) }}</div>
		</div>

		@if (isset($user->networks[1]))
		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_2', $user->networks[1]['nid'], array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_2', $user->networks[1]['n_name'], array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_2', $user->networks[1]['n_ip'], array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_2', User::$networkDropDown, $user->networks[1]['n_status'], array('class' => 'form-control')) }}</div>
		</div>
		@else
		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_2', '', array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_2', '', array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_2', '', array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_2', User::$networkDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		@endif

		@if (isset($user->networks[2]))
		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_3', $user->networks[2]['nid'], array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_3', $user->networks[2]['n_name'], array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_3', $user->networks[2]['n_ip'], array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_3', User::$networkDropDown, $user->networks[2]['n_status'], array('class' => 'form-control')) }}</div>
		</div>
		@else
		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_3', '', array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_3', '', array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_3', '', array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_3', User::$networkDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		@endif
		
	</div>
	<br/><br/>
	<div class="form-group">
		{{ Form::label('hostnames', 'Hostnames') }}
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_1', $user->hostnames[0]['hostname'], array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_1', User::$hostnameDropDown, $user->hostnames[0]['block'], array('class' => 'form-control')) }}</div>
		</div>

		@if (isset($user->hostnames[1]))
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_2', $user->hostnames[1]['hostname'], array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_2', User::$hostnameDropDown, $user->hostnames[1]['block'], array('class' => 'form-control')) }}</div>
		</div>
		@else
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_2', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_2', User::$hostnameDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		@endif

		@if (isset($user->hostnames[2]))
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_3', $user->hostnames[2]['hostname'], array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_3', User::$hostnameDropDown, $user->hostnames[2]['block'], array('class' => 'form-control')) }}</div>
		</div>
		@else
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_3', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_3', User::$hostnameDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		@endif
	</div>
	<br><br>
	{{ Form::submit('Save User', array('class' => 'btn btn-success')) }}

{{ Form::close() }}



	


@stop