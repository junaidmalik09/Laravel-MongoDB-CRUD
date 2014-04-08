@extends('master')

@section('container')
<h1>Create a User</h1>

<!-- if there are creation errors, they will show here -->
<div class="error">
{{ HTML::ul($errors->all()) }}
</div>

{{ Form::open(array('url' => '/users','class'=>'form-inline')) }}

	<div class="form-group">
		<?php $errArray = $errors->all(); ?>
		@if (empty($errArray))
		{{ Form::hidden('networkCount',1,array('class'=>'form-control','id'=>'networkCount')) }}
		{{ Form::hidden('hostnameCount',1,array('id'=>'hostnameCount')) }}
		@else
		{{ Form::hidden('networkCount',Input::old('networkCount'),array('class'=>'form-control','id'=>'networkCount')) }}
		{{ Form::hidden('hostnameCount',Input::old('hostnameCount'),array('id'=>'hostnameCount')) }}
		@endif

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

		@if (Input::old('networkCount') > 1)
		@for ($i=2; $i<=Input::old('networkCount'); $i++)
			<br>
			<div class="row">
				<div class="col-md-3">{{ Form::text('nid_'.$i, '', array('class' => 'form-control','placeholder'=>'Network ID')) }}</div>
				<div class="col-md-3">{{ Form::text('n_name_'.$i, '', array('class' => 'form-control','placeholder'=>'Network Name')) }}</div>
				<div class="col-md-2">{{ Form::text('n_ip_'.$i, '', array('class' => 'form-control','placeholder'=>'Network IP')) }}</div>
				<div class="col-md-2">{{ Form::select('n_status_'.$i, User::$networkDropDown, '', array('class' => 'form-control')) }}</div>
				<div class="col-md-2">{{ Form::checkbox('network_check_'.$i, 1, true) }} Include</div>
			</div>
		@endfor
		@endif
	</div>
	<br><br><div class="btn btn-primary" id="addMoreNetworks"><span class="glyphicon glyphicon-plus"></span> Add More</div><br><br>


	<br/><br/>
	<div class="form-group" id="hostnameFields">
		{{ Form::label('nerd_level', 'Hostnames') }}
		<br>
		<div class="row">
			<div class="col-md-6">{{ Form::text('hostname_1', '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
			<div class="col-md-6">{{ Form::select('block_1', User::$hostnameDropDown, '', array('class' => 'form-control')) }}</div>
		</div>

		@if (Input::old('hostnameCount') > 1)
		@for ($i=2; $i<=Input::old('hostnameCount'); $i++)
			<br>
			<div class="row">
				<div class="col-md-4">{{ Form::text('hostname_'.$i, '', array('class' => 'form-control','placeholder'=>'Hostname')) }}</div>
				<div class="col-md-4">{{ Form::select('block_'.$i, User::$hostnameDropDown, '', array('class' => 'form-control')) }}</div>
				<div class="col-md-3">{{ Form::checkbox('hostname_check_'.$i, 1, true) }} Include</div>
			</div>
		@endfor
		@endif
	</div>

	<br><br><div class="btn btn-primary" id="addMoreHostnames"><span class="glyphicon glyphicon-plus"></span> Add More</div><br><br>
	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> Create</button>

{{ Form::close() }}



<script type="text/javascript">
	$("#addMoreNetworks").click(function(){
		var networkCount = $("#networkCount").val();
		networkCount++;
		
		var fieldToAdd = '<br><div class="row">';
		
		fieldToAdd += '<div class="col-md-3"><input class="form-control" placeholder="Network ID" name="nid_'+networkCount+'" type="text" value=""></div>';
		fieldToAdd += '<div class="col-md-3"><input class="form-control" placeholder="Network Name" name="n_name_'+networkCount+'" type="text" value=""></div>';
		fieldToAdd += '<div class="col-md-2"><input class="form-control" placeholder="Network IP" name="n_ip_'+networkCount+'" type="text" value=""></div>';
		fieldToAdd += '<div class="col-md-2"><select class="form-control" name="n_status_'+networkCount+'"><option value="" selected="selected">Select .. </option><option value="0">UnBlocked</option><option value="1">Blocked</option></select></div>';
		fieldToAdd += '<div class="col-md-2"><input type="checkbox" name="network_check_'+networkCount+'" checked /> Include</div>';

		fieldToAdd += '</div>';
		
		$("#networkCount").val(networkCount);
		$("#networkFields").append(fieldToAdd);

	});

	$("#addMoreHostnames").click(function() {
		var hostnameCount = $("#hostnameCount").val();
		hostnameCount++;

		var fieldToAdd = '<br><div class="row">';
		
		fieldToAdd += '<div class="col-md-4"><input class="form-control" placeholder="Hostname" name="hostname_'+hostnameCount+'" type="text" value=""></div>';
		fieldToAdd += '<div class="col-md-4"><select class="form-control" name="block_'+hostnameCount+'"><option value="" selected="selected">Select .. </option><option value="0">UnBlocked</option><option value="1">Blocked</option></select></div>';
		fieldToAdd += '<div class="col-md-3"><input type="checkbox" name="block_check_'+hostnameCount+'" checked /> Include</div>';

		fieldToAdd += '</div>';

		$("#hostnameCount").val(hostnameCount);
		$("#hostnameFields").append(fieldToAdd);
	});
</script>


@stop