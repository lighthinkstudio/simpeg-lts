<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
	<title>{{ $title ?? 'Halaman Login' }}</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">
	<style>
		.login-box{
			width: 480px !important;
		}
	</style>
</head>
<body class="hold-transition login-page">
	
	<div class="login-box">
		@yield('content')
	</div>

	<script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>
</html>
