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
			<div class="card-body">
				<form action="{{ url()->current() }}">
					<div class="row mb-2">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-check-label mr-1" for="limit">
									Show 
								</label>
								<select name="limit" class="custom-select custom-select-sm form-control form-control-sm col-2" aria-controls="limit">
									<option value="10" @if($limit == 10)selected @endif>10</option>
									<option value="25" @if($limit == 25)selected @endif>25</option>
									<option value="50" @if($limit == 50)selected @endif>50</option>
									<option value="100" @if($limit == 100)selected @endif>100</option>
								</select>
								<label class="form-check-label ml-1" for="limit">
									entries 
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="float-right">
								<div class="form-inline">
									<label class="form-check-label mr-1" for="search">
										Search: 
									</label>
									<div class="input-group">
										<input type="search" name="search" class="form-control form-control-sm" value="{{ $_GET['search'] ?? '' }}" placeholder="Ketik nama/ nip pegawai..." aria-controls="search">
										<span class="input-group-append">
											<button type="submit" class="btn btn-sm btn-info">
												<i class="fas fa-search"></i> Cari
											</button>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

				<table class="table table-bordered table-hover projects">
					<thead>
						<tr>
							<th width="6%" class="text-center">NO.</th>
							<th width="35%">NIP/ NAMA</th>
							<th>EMAIL</th>
							<th width="14%" class="text-center">ACTION</th>
						</tr>
					</thead>
					<tbody>
						@if($pegawai->total() > 0)
						@foreach($pegawai as $no => $data)
						<tr>
							<td class="text-center">{{ $pegawai->firstItem() + $no }}</td>
							<td>
								<div class="row align-items-center">
									<div class="col-3 text-center">
										@if(file_exists(public_path('storage/assets/images/profil/' . $data->foto)))
										<img src="{{ asset('storage/assets/uploads/images/square/' . $data->foto) }}" class="img-thumbnail img-circle img-size-50 mr-2" alt="User Image">
										@else
										<img src="{{ asset('assets/images/icons/user.png') }}" class="img-thumbnail img-circle img-size-50 mr-2" alt="User Image">
										@endif
									</div>
									<div class="col-9">
										{{ $data->nama }} <br>
										<small class="text-primary">{{ $data->nipBaru }}</small><br>

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
							<td class="text-center">
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalPassword{{ $data->id }}" data-backdrop="static">
										<i class="fas fa-key"></i>
									</button>
									<button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#Detail{{ $data->id }}" data-backdrop="static">
										<i class="fas fa-eye"></i>
									</button>
									<a href="{{ route('admin.edit_pegawai', $data->id) }}" class="btn btn-sm btn-outline-warning">
										<i class="fas fa-edit"></i>
									</a>
								</div>
							</td>
							{{-- @include('admin.pegawai.password') --}}
							{{-- @include('admin.pegawai.detail') --}}
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="4" class="text-center">DATA TIDAK TERSEDIA</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
			<div class="card-footer clearfix">
				<div class="row">
					<div class="col-6">
						<caption>Showing {{ $pegawai->firstItem() ?? 0 }} to {{ $pegawai->lastItem() ?? 0 }} of {{ $pegawai->total() }} entries</caption>
					</div>
					<div class="col-6">
						<div class="float-right">{{ $pegawai->onEachSide(1)->links() }}</div>
					</div>
				</div>
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