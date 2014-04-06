<?php
	print_r($_POST);
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:20;
			font-family:'Lato', sans-serif;

			text-align:left;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	<h1>oDesk Test Task</h1>
	{{ Form::open(array('url'=>' ')) }}
		
		{{ Form::text('uid')  }}
	<h2>Networks</h2>
	<div id="networks">
		{{ Form::text('nid[]')  }}
		{{ Form::text('n_name[]')  }}
		{{ Form::text('n_ip[]')  }}
		{{ Form::text('n_status[]')  }}
	</div>


	<h2>Hostnames</h2>
		{{ Form::text('hostname')  }}
		{{ Form::text('block')  }}
		

	<br/>
	{{ Form::submit('Shorten') }}
	{{ Form::close() }}
	
</body>
</html>
