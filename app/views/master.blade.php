<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<style type="text/css">
	.error {
		color:red;
		font-style: italic; 
	}
	</style>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
<div class="container">

<nav class="navbar">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('users') }}">oDesk Test Task</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('users') }}">View All Users</a></li>
		<li><a href="{{ URL::to('users/create') }}">Create a User</a>
	</ul>
</nav>

@yield('container')


</div>
</body>
</html>