@extends('master')

@section('container')
<h1>Create a User</h1>

<!-- if there are creation errors, they will show here -->
<div class="error">
{{ HTML::ul($errors->all()) }}
</div>

{{ Form::open(array('url' => '/users','class'=>'form-inline')) }}

	<div class="form-group">
		{{ Form::hidden('networkCount',1,array('class'=>'form-control','id'=>'networkCount'))}}
		{{ Form::label('uid', 'User ID') }}
		{{ Form::text('uid', Input::old('uid'), array('class' => 'form-control')) }}
	</div>
	<br/><br/>
	<div class="form-group" id="networkFields">
		{{ Form::label('networks', 'Networks') }}
		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_1', '', array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_1', '', array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_1', '', array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_1', User::$networkDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_2', '', array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_2', '', array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_2', '', array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_2', User::$networkDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_3', '', array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_3', '', array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_3', '', array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_3', User::$networkDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		
	</div>
	<br/><br/>
	<div class="form-group">
		{{ Form::label('nerd_level', 'Hostnames') }}
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_1', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_1', User::$hostnameDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_2', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_2', User::$hostnameDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_3', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_3', User::$hostnameDropDown, '', array('class' => 'form-control')) }}</div>
		</div>
	</div>
	<br><br>	
	{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}



	


@stop