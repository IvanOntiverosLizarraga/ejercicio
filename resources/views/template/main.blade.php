<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href=" {{ asset('recursos/bootstrap/css/bootstrap.css') }} ">
	<link rel="stylesheet" href=" {{ asset('recursos/mystiles/styles.css') }} ">
	<link rel="stylesheet" href=" {{ asset('recursos/mystiles/login.css') }} ">
</head>
<body>
	
	@include('template.partials.nav')

	<section>
		@yield('content')
	</section>
	
	<script src="{{ asset('recursos/jquery/js/jquery-3.2.1.js') }}"></script>
	<script src="{{ asset('recursos/popper/js/popper.js') }}"></script>
	<script src="{{ asset('recursos/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>