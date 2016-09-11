<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laravel Login Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<ul class="nav nav-pills">
	@if(\Auth::check())
	<li>
	{{ link_to_route('logout', 'Logout') }}
	</li>
	@else
	<li>
	{{ link_to_route('login', 'Login') }}
	</li>
	@endif
	<li>
	{{ link_to_route('users.create', 'New Users') }}
	</li>
</ul>
@yield('content')
</div>

</body>

</html>