@extends('admin.layouts.adminlte.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-right">
					<a href="{{ route('admin.tambah_pegawai') }}" class="btn btn-primary">
						<i class="fas fa-plus-square"></i> Tambah
					</a>

					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Import">
						<i class="fas fa-file-import"></i> Import
					</button>
				</div>
				@include('admin.pegawai.import')
			</div>
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
				<table class="table table-responsive table-bordered table-hover projects">
					<thead class="bg-primary">
						<tr>
							<th width="1%" class="text-center">NO.</th>
							<th width="40%">NAMA/ NIP</th>
							<th width="">KETERANGAN</th>
							<th width="15%" class="text-center">ACTION</th>
						</tr>
					</thead>
					<tbody>
						@if($pegawai->total() > 0)
						@foreach($pegawai as $key => $data)
						<tr>
							<td class="text-center">{{ $pegawai->firstItem() + $key }}</td>
							<td>
								<div class="card card-primary mb-0">
									<div class="row align-items-center p-3">
										<div class="col-md-3 text-center">
											@if(file_exists(public_path('storage/assets/uploads/images/' . $data->foto)))
											<img src="{{ asset('storage/assets/uploads/images/' . $data->foto) }}" class="img-thumbnail img-circle mr-2" width="80" alt="User Image">
											@else
											<img src="{{ asset('assets/images/icons/user.png') }}" width="80" class="img-thumbnail img-circle mr-2" alt="User Image">
											@endif
										</div>
										<div class="col-md-9">
											<small>
												<strong>
													@if($data->gelarDepan)
													{{ $data->gelarDepan }}.
													@endif
													@if($data->gelarBelakang)
													{{ $data->nama }},
													{{ $data->gelarBelakang }}
													@else
													{{ $data->nama }}
													@endif
												</strong>
											</small><br>

											

											<span>
												<i class="fas fa-fw fa-user-check"></i>
												@if($data->statusPegawai == 'PNS')
												<small><span class="badge badge-pill badge-success text-uppercase">{{ $data->statusPegawai .' '. $data->kedudukanPnsNama }}</span></small>
												@elseif($data->statusPegawai == 'inactive')
												<small><span class="badge badge-pill badge-danger text-uppercase">{{ $data->statusPegawai .' '. $data->kedudukanPnsNama }}</span></small>
												@else
												<small><span class="badge badge-pill badge-warning text-uppercase text-white">{{ $data->statusPegawai .' '. $data->kedudukanPnsNama }}</span></small>
												@endif
											</span><br>

											<span>
												<i class="fas fa-fw fa-id-badge"></i>
												{{ $data->nipBaru }}
											</span><br>

											<span>
												<i class="fas fa-fw fa-calendar-day"></i>
												<small>{{ $data->tempatLahir ? $data->tempatLahir : '-' }}, {{ tanggal(date($data->tglLahir), 'd F Y') }}</small>
											</span><br>

											@if($data->jenisKelamin == 'M')
											<span>
												<i class="fas fa-fw fa-mars"></i>
												<small>LAKI-LAKI</small>
											</span>
											@elseif($data->jenisKelamin == 'F')
											<span>
												<i class="fas fa-fw fa-venus"></i>
												<small>PEREMPUAN</small>
											</span>
											@else
											<span>
												<i class="fas fa-fw fa-genderless"></i>
												<small>-</small>
											</span>
											@endif
										</div>
									</div>
								</div>
							</td>
							<td></td>
							<td class="text-center">
								<div class="btn-group">
									<a href="{{ route('admin.detail_pegawai', $data->pnsId) }}" class="btn btn-sm btn-outline-info">
										<i class="fas fa-eye"></i>
									</a>
									<a href="{{ route('admin.edit_pegawai', $data->pnsId) }}" class="btn btn-sm btn-outline-warning">
										<i class="fas fa-edit"></i>
									</a>
									<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#Hapus{{ $data->pnsId }}">
										<i class="fas fa-trash"></i>
									</button>
								</div>
							</td>
							@include('admin.pegawai.delete')
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
@endsection