@extends('auth.app')

@section('content')
<div class="card card-outline card-purple">
	<div class="text-center p-2">
		@if(file_exists(public_path('storage/assets/uploads/logo/' . konfigurasi('icon')->deskripsi)))
		<img width="180" src="{{ asset('storage/assets/uploads/logo/' . konfigurasi('icon')->deskripsi) }}" class="brand-image" style="opacity: .8">
		@else
		<img width="180" src="{{ asset('assets/images/logo/lhtk_indigo.png') }}" class="brand-image" style="opacity: .8">
		@endif
	</div>
	<div class="card-header text-center">
		<h1 class="text-dark">SIMPEG <strong>LTS</strong> {{ konfigurasi('versi')->deskripsi ?? 'v.1.0.0' }}</h1>
	</div>
	<div class="card-body">
		@if($warning = Session::get('warning'))
		<div class="alert alert-warning alert-dismissible text-white">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{{ $warning }}
		</div>
		@endif

		@if($danger = Session::get('danger'))
		<div class="alert alert-danger alert-dismissible text-white">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{!! $danger !!}
		</div>
		@endif

		<form action="{{ route('login') }}" method="POST">
			@csrf
			<div class="form-group mb-3">
				<div class="input-group">
					<input type="text" name="username" class="form-control @if(empty(Session::get('warning')) && empty(Session::get('danger'))) @error('username') is-invalid @enderror @endif" placeholder="Username">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				@if(empty(Session::get('warning')) && empty(Session::get('danger')))
					@error('username')
					<span class="text-danger mt-2">
						<small>{{ $message }}</small>
					</span>    
					@enderror
				@endif
			</div>
			<div class="form-group mb-3">
				<div class="input-group">
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-key"></span>
						</div>
					</div>
				</div>
				@error('password')
				<span class="text-danger mt-2">
					<small>{{ $message }}</small>
				</span>    
				@enderror
			</div>
			<div class="row">
				<div class="col-8">
					<div class="icheck-primary">
						<input type="checkbox" id="remember">
						<label for="remember">
							Remember Me
						</label>
					</div>
				</div>

				<div class="col-4">
					<button type="submit" class="btn btn-primary btn-block">Sign In</button>
				</div>

			</div>
		</form>

		<p class="mb-1">
			<a class="btn btn-link" href="{{ route('password.request') }}">Forgot Password</a>
		</p>
	</div>

</div>
@endsection