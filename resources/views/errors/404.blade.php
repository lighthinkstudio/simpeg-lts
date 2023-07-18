@extends('errors::layout', ['title' => 'Page Not Found!'])

@section('content')

<section class="content">
	<div class="error-page">
		<h2 class="headline text-warning"> 404</h2>
		<div class="error-content">
			<h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
			<p>
				Maaf, halaman yang anda cari tidak tersedia. <br>
				Silahkan periksa alamat url yang anda akses, pastikan url tersebut sudah benar. <br>
				<a href="{{ route('login') }}" class="btn btn-outline-info">
					<i class="fas fa-home"></i> Kembali ke Dashboard
				</a>
			</p>
		</div>
	</div>
</section>
@endsection
