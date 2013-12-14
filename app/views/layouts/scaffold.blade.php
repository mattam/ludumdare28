<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
	</head>

	<body>

		<div class="container">
			 @section('navigation')
	        <nav class="navbar navbar-default" role="navigation">
	            <div class="">
	              <ul class="nav navbar-nav">
	                <li><a href="/">Home</a></li>
	                @if (Sentry::check())
	                	<li><a href="{{ URL::route('dices.index') }}"><i></i> Dices</a></li>
	                    <li><a href="{{ URL::route('auth.logout') }}"><i></i> Logout</a></li>
	                @else
	                    <li><a href="{{ URL::route('auth.login') }}"><i></i> Login</a></li>
	                @endif
	              </ul>
	            </div>
	        </nav>
	        @show     

			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>

	</body>

</html>