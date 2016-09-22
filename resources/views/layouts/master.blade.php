<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Personal Finance Manager</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.min.js" type="text/javascript"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://localhost:8888/laravel5loginregistration.dev/public/main.css">
</head>
<body>
<div class="container">
<h1>Personal Finance Manager</h1>
<ul class="nav nav-pills">
	@if(\Auth::check())
	<li>
	{{ link_to_route('home', 'Home') }}
	</li>
	<li>
	{{ link_to_route('income', 'Income') }}
	</li>
	<li>
	{{ link_to_route('bills', 'Bills') }}
	</li>
	<li>
	{{ link_to_route('logout', 'Logout') }}
	</li>
	@else
	<li>
	{{ link_to_route('login', 'Login') }}
	</li>	
	<li>
	{{ link_to_route('users.create', 'New Users') }}
	</li>
	@endif

</ul>
@yield('content')
</div>

</body>

</html>