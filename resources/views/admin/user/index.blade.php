@extends('admin.layouts.adminlte.app')

@section('content')
@include('plugins.select2_css')
@include('plugins.datatables_css')

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
				<a href="{{ route('admin.tambah_user')}}" class="btn btn-outline-primary">
					<i class="fas fa-plus"></i> Tambah
				</a>
			</div>
			<div class="card-body">
				<table id="datatables" class="table table-bordered table-hover projects">
					<thead>
						<tr>
							<th width="6%" class="text-center">NO.</th>
							<th>NAMA/ NIP</th>
							<th>EMAIL</th>
							<th width="16%" class="text-center">ROLE</th>
							<th width="14%" class="text-center">ACTION</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user as $no => $data)
						<tr>
							<td class="text-center">{{ $no + 1 }}</td>
							<td>
								<div class="row align-items-center">
									<div class="col-3">
										@if(file_exists(public_path('storage/assets/images/profil/' . $data->foto)))
										<img src="{{ asset('storage/assets/uploads/images/square/' . $data->foto) }}" class="img-thumbnail img-circle img-size-50 mr-2" alt="User Image">
										@else
										<img src="{{ asset('assets/images/icons/user.png') }}" class="img-thumbnail img-circle img-size-50 mr-2" alt="User Image">
										@endif
									</div>
									<div class="col-9">
										{{ $data->nama }} <br>
										<small class="text-primary">{{ $data->nip }}</small><br>

										@if($data->status === 'active')
										<span class="badge bg-success">{{ Str::headline($data->status) }}</span>
										@elseif($data->status === 'blocked')
										<span class="badge bg-warning"><span class="text-white">{{ Str::headline($data->status) }}</span></span>
										@else
										<span class="badge bg-danger">{{ Str::headline($data->status) }}</span>
										@endif
									</div>
								</div>
							</td>
							<td>{{ $data->email }}</td>
							<td>{{ $data->nama_role }}</td>
							<td class="text-center">
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalPassword{{ $data->id }}" data-backdrop="static">
										<i class="fas fa-key"></i>
									</button>
									<button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#Detail{{ $data->id }}" data-backdrop="static">
										<i class="fas fa-eye"></i>
									</button>
									<a href="{{ route('admin.edit_user', $data->id) }}" class="btn btn-sm btn-outline-warning">
										<i class="fas fa-edit"></i>
									</a>
									<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#Hapus{{ $data->id }}">
										<i class="fas fa-trash"></i>
									</button>
								</div>
							</td>
							@include('admin.user.password')
							@include('admin.user.detail')
							@include('admin.user.delete')
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@include('plugins.custom_file_input_js')
@include('plugins.datatables_js')
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