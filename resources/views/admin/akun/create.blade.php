@extends('admin.layouts.adminlte.app')

@section('content')
@include('plugins.select2_css')

<style>
	#imagePreview {
		width: 120px;
		height: 120px;
		background-position: center center;
		background-size: cover;
		-webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
		display: inline-block;
	}
	#imagePreview img {
		width: 100%;
		height: auto;
	}
</style>

<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<a href="{{ route('admin.user') }}" class="btn btn-secondary float-right">
					<i class="fas fa-backward"></i> Kembali
				</a>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.simpan_user') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					<div class="form-group row mb-3">
						<label for="name" class="col-md-3"></label>
						<div class="col-md-9">
							<div id="imagePreview"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="foto" class="col-md-3">FOTO</label>
						<div class="col-md-9">
							<input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
							@error('foto')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="nip" class="col-md-3">NAMA LENGKAP</label>
						<div class="col-md-9">
							<select name="nip" class="form-control select2bs4 @error('nip') is-invalid @enderror">
								<option value="">PILIH PEGAWAI</option>
								@foreach($pegawai as $pegawai)
								<option value="{{ $pegawai->nip }}" @if(old('nip') == $pegawai->nip) Selected @endif>@if(!empty($pegawai->gelar_depan)) {{ $pegawai->gelar_depan . ' ' }} @endif {{ $pegawai->nama_pegawai }} @if(!empty($pegawai->gelar_belakang)) {{ ' '. $pegawai->gelar_belakang }} @endif @if(!empty($pegawai->jabatan)) {{ '('. Str::upper(Str::headline($pegawai->jabatan) .' - '. Str::headline($pegawai->satuan_kerja)) .')'}} @endif</option>
								@endforeach
							</select>
							@error('nip')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-md-3">EMAIL</label>
						<div class="col-md-9">
							<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email">
							@error('email')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-md-3">PASSWORD</label>
						<div class="col-md-9">
							<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password">
							@error('password')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="role" class="col-md-3">ROLE</label>
						<div class="col-md-9">
							<select name="role" class="custom-select @error('role') is-invalid @enderror">
								<option value="">PILIH ROLE</option>
								@foreach($role as $role)
								<option value="{{ $role->kode }}" @if(old('role') == $role->kode) Selected @endif>{{ $role->nama }}</option>
								@endforeach
							</select>
							@error('role')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-md-3">STATUS</label>
						<div class="col-md-9">
							<select name="status" class="custom-select @error('status') is-invalid @enderror">
								<option value="active" @if(old('status') == 'active') Selected @endif>ACTIVE</option>
								<option value="inactive" @if(old('status') == 'inactive') Selected @endif>INACTIVE</option>
								<option value="blocked" @if(old('status') == 'blocked') Selected @endif>BLOCKED</option>
							</select>
							@error('status')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 offset-3">
							<a href="{{ route('admin.user') }}" class="btn btn-outline-secondary">
								<i class="fas fa-undo"></i> Kembali
							</a>
							<button type="reset" class="btn btn-outline-info">
								<i class="fas fa-sync-alt"></i> Reset
							</button>
							<button type="submit" class="btn btn-outline-success">
								<i class="fas fa-save"></i> Simpan
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

@include('plugins.select2_js')

<script type="text/javascript">
$(function() {
    $("#foto").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            var oldImage = document.getElementById('oldImage');
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
				oldImage.parentNode.removeChild(oldImage);
            }
        }
    });
});
</script>
@endsection