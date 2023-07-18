@extends('admin.layouts.adminlte.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card card-indigo card-outline">
			<div class="card-body">
				<form action="{{ route('admin.update_konfigurasi') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<div class="row justify-content-center">
						<div class="col-12">
							@foreach($konfigurasi as $value)
								@if($value->tipe == 'text')
								<div class="form-group row">
									<label for="{{ $value->nama }}" class="col-md-3 col-form-label">{{ Str::ucfirst($value->label) }}</label>
									<div class="col-md-9">
										<input type="{{ $value->tipe }}" name="{{ $value->nama }}" class="form-control" value="{{ $value->deskripsi }}" id="{{ $value->nama }}" placeholder="{{ Str::ucfirst($value->label) }}">
									</div>
								</div>
								@endif
								@if($value->tipe == 'textarea')
								<div class="form-group row">
									<label for="{{ $value->nama }}" class="col-md-3 col-form-label">{{ Str::ucfirst($value->label) }}</label>
									<div class="col-md-9">
										<textarea name="{{ $value->nama }}" id="{{ $value->nama }}" class="form-control editor" rows="3">{{ $value->deskripsi }}</textarea>
									</div>
								</div>
								@endif
								@if($value->tipe == 'file')
								<div class="form-group row align-items-center">
									<label for="{{ $value->nama }}" class="col-md-3 col-form-label">{{ Str::ucfirst($value->label) }}</label>
									<div class="col-md-6">
										<div class="custom-file">
											<input type="{{ $value->tipe }}" name="{{ $value->nama }}" class="custom-file-input" value="{{ $value->deskripsi }}" id="{{ $value->nama }}" placeholder="{{ Str::ucfirst($value->label) }}">
											<label class="custom-file-label" for="{{ $value->nama }}" data-browse="Choose file">{{ $value->deskripsi }}</label>
										</div>
									</div>
									<div class="col-md-3">
										<img src="@if(file_exists(public_path('storage/assets/uploads/logo/' . $value->deskripsi))) {{ asset('storage/assets/uploads/logo/' . $value->deskripsi) }} @else {{ asset('assets/images/logo/' . $value->deskripsi) }} @endif" class="img-thumbnail bg-light" alt="{{ $value->label }}">
									</div>
								</div>
								@endif
								@if($value->tipe == 'embed')
								<div class="form-group row">
									<label for="{{ $value->nama }}" class="col-md-3 col-form-label">{{ Str::ucfirst($value->label) }}</label>
									<div class="col-md-9">
										<textarea name="{{ $value->nama }}" id="{{ $value->nama }}" class="form-control" rows="6">{{ $value->deskripsi }}</textarea>
										<div class="mt-3">
											{!! $value->deskripsi !!}
										</div>
									</div>
								</div>
								@endif
							@endforeach
							<div class="form-group row">
								<label for="button" class="col-md-3"></label>
								<div class="col-md-9">
									<button type="reset" name="reset" class="btn btn-outline-secondary">
										<i class="fas fa-sync"></i> Reset
									</button>
									<button type="submit" class="btn btn-outline-warning">
										<i class="fas fa-edit"></i> Update
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@include('plugins.tinymce_js')
@include('plugins.custom_file_input_js')
@endsection