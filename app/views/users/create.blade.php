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
			<div class="col-md-3">{{ Form::select('n_status_1', array('' => 'Select a Status', '1' => 'Blocked', '2' => 'UnBlocked'), '', array('class' => 'form-control')) }}</div>
		</div>

		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_2', '', array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_2', '', array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_2', '', array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_2', array('' => 'Select a Status', '1' => 'Blocked', '2' => 'UnBlocked'), '', array('class' => 'form-control')) }}</div>
		</div>

		<div class="row">
			<div class="col-md-3">{{ Form::text('nid_3', '', array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
			<div class="col-md-3">{{ Form::text('n_name_3', '', array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
			<div class="col-md-3">{{ Form::text('n_ip_3', '', array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
			<div class="col-md-3">{{ Form::select('n_status_3', array('' => 'Select a Status', '1' => 'Blocked', '2' => 'UnBlocked'), '', array('class' => 'form-control')) }}</div>
		</div>
		
	</div>
	<br/><br/>
	<div class="form-group">
		{{ Form::label('nerd_level', 'Hostnames') }}
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_1', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_1', array('' => 'Select a Status', '1' => 'Blocked', '2' => 'UnBlocked'), '', array('class' => 'form-control')) }}</div>
		</div>

		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_2', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_2', array('' => 'Select a Status', '1' => 'Blocked', '2' => 'UnBlocked'), '', array('class' => 'form-control')) }}</div>
		</div>

		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_3', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_3', array('' => 'Select a Status', '1' => 'Blocked', '2' => 'UnBlocked'), '', array('class' => 'form-control')) }}</div>
		</div>
	</div>
	<br><br>	
	{{ Form::submit('Create the User!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}



	<script type="text/javascript">
	$("#addMore").click(function() {
		/*var networkCount = parseInt($("#networkCount").val());
		networkCount++;
		var fieldsToAdd = '<br>';
		fieldsToAdd += '<div class="row">';
		fieldsToAdd += '<div class="col-md-3"><input class="form-control" placeholder="Network ID" name="nid_'+networkCount+'" type="text" value=""></div>';
		fieldsToAdd += '<div class="col-md-3"><input class="form-control" placeholder="Network Name" name="n_name_'+networkCount+'" type="text" value=""></div>';
		fieldsToAdd += '<div class="col-md-3"><input class="form-control" placeholder="Network IP" name="n_ip_'+networkCount+'" type="text" value=""></div>';
		fieldsToAdd += '<div class="col-md-3">';
		fieldsToAdd += '<select class="form-control" name="n_status_'+networkCount+'"><option value="9">Select a Status</option><option value="1">Blocked</option><option value="2">UnBlocked</option></select></div>';
		fieldsToAdd += '</div>';
		
		$("#networkFields").append(fieldsToAdd);
		$("#networkCount").val(networkCount);*/

	});

	</script>


@stop