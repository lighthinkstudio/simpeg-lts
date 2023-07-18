@extends('auth.app')

@section('content')
<div class="card card-outline card-primary">
	<div class="text-center p-2">
		@if(file_exists(public_path('storage/assets/uploads/logo/' . konfigurasi('icon')->deskripsi)))
		<img width="180" src="{{ asset('storage/assets/uploads/logo/' . konfigurasi('icon')->deskripsi) }}" class="brand-image" style="opacity: .8">
		@else
		<img width="180" src="{{ asset('assets/images/logo/lhtk_indigo.png') }}" class="brand-image" style="opacity: .8">
		@endif
	</div>
	<div class="card-header text-center">
		<h1 class="text-dark">SIMPEG <strong>LTS</strong> v1.0.0</h1>
	</div>
	<div class="card-body">
		<form action="recover-password.html" method="post">
			<div class="input-group mb-3">
				<input type="email" class="form-control" placeholder="Email">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-envelope"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" class="btn btn-primary btn-block">Request New Password</button>
				</div>
			</div>
		</form>
		<p class="mt-3 mb-1">
			<a class="btn btn-link" href="{{ route('home') }}">
				<i class="fas fa-home"></i> Back to Home
			</a>
			<a class="btn btn-link float-right" href="{{ route('login') }}">
				<i class="fas fa-lock"></i> Back to Login
			</a>
		</p>
	</div>
</div>
@endsection