@extends('admin.layouts.adminlte.app')

@section('content')
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="card-title">DATA PEGAWAI</h5>

		<div class="card-tools">
			<a href="{{ route('admin.edit_pegawai', $pegawai->pnsId)}}" class="btn btn-sm btn-tool text-primary">
				<i class="fas fa-external-link-alt"></i> EDIT DATA
			</a>

			<a href="{{ route('admin.sinkron_pegawai', $pegawai->nipBaru)}}" class="btn btn-sm btn-tool text-warning">
				<i class="fas fa-sync"></i> SYNC DATA
			</a>

			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove">
				<i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	<!-- /.card-header -->

	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<!-- Profil -->
				<div class="card card-primary">
					<div class="card-header">
						<h5 class="text-center">PROFIL</h5>
					</div>

					<div class="card-body box-profile">
						<div class="text-center">
							@if(file_exists(public_path('storage/assets/uploads/images/' . $pegawai->foto)))
							<img src="{{ asset('storage/assets/uploads/images/' . $pegawai->foto) }}" class="img-thumbnail img-circle mr-2" width="120" alt="{{ $pegawai->nama }}">
							@else
							<img src="{{ asset('assets/images/icons/user.png') }}" width="120" class="img-thumbnail img-circle mr-2" alt="{{ $pegawai->nama }}">
							@endif
						</div>

						<div class="text-center mt-2">
							@if($pegawai->kedudukanPnsId == '01')
							<small>
								<span class="badge badge-pill badge-success text-uppercase">
									<i class="fas fa-fw fa-user-check"></i> {{ $pegawai->kedudukanPnsNama }}
								</span>
							</small>
							@elseif($pegawai->status == '02')
							<small>
								<span class="badge badge-pill badge-danger text-uppercase">
									<i class="fas fa-fw fa-user-xmark"></i> {{ $pegawai->kedudukanPnsNama }}
								</span>
							</small>
							@else
							<small>
								<span class="badge badge-pill badge-warning text-uppercase text-white">
									<i class="fas fa-fw fa-user-minus"></i> {{ $pegawai->kedudukanPnsNama }}
								</span>
							</small>
							@endif
						</div>

						<div class="text-center">
							<small>
								<strong>
									@if($pegawai->gelarDepan)
									{{ $pegawai->gelarDepan }}
									@endif
									@if($pegawai->gelarBelakang)
									{{ $pegawai->nama }},
									{{ $pegawai->gelarBelakang }}
									@else
									{{ $pegawai->nama }}
									@endif
								</strong>
							</small>
						</div>

						<div class="text-center mb-3">
							<strong class="text-center text-primary">
								<i class="fas fa-fw fa-id-badge"></i> {{ $pegawai->nipBaru}}
							</strong>
						</div>

						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<small><strong>JABATAN</strong></small><br>
								<small class="text-muted">{{ Str::upper($pegawai->jabatanNama) }}</small>
							</li>
							<li class="list-group-item">
								<small><strong>PANGKAT</strong></small><br>
								<small class="text-muted">{{ Str::upper($pegawai->pangkatAkhir) }}</small>
							</li>
							<li class="list-group-item">
								<small><strong>GOLONGAN</strong></small><br>
								<small class="text-muted">{{ $pegawai->golRuangAkhir }}</small>
							</li>
							<li class="list-group-item">
								<small><strong>UNIT KERJA</strong></small><br>
								<small class="text-muted">{{ $pegawai->unorIndukNama }}</small>
							</li>
						</ul>

						<a href="{{ route('admin.edit_pegawai', $pegawai->pnsId) }}" class="btn btn-block btn-warning text-white">
							<i class="fas fa-edit"></i> <strong>EDIT DATA PEGAWAI</strong>
						</a>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- End Profil -->

				<div class="card">
					<div class="card-body">
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<small><strong>PENDIDIKAN TERAKHIR</strong></small><br>
								<small class="text-muted">{{ $pegawai->pendidikanTerakhirNama }}</small>
							</li>
							<li class="list-group-item">
								<small><strong>MASA KERJA</strong></small><br>
								<small class="text-muted">{{ $pegawai->mkTahun .' TAHUN '. $pegawai->mkBulan .' BULAN'}}</small>
							</li>
							<li class="list-group-item">
								<small><strong>TMT CPNS &amp; PNS</strong></small><br>
								<small class="text-muted">
									{{ tanggal($pegawai->tmtCpns, 'd F Y') }} &amp; {{ tanggal($pegawai->tmtPns, 'd F Y') }}
								</small>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<!-- Data Pegawai -->
				<div class="card card-primary">
					<div class="card-body">
						<form class="form-horizontal">
							<div class="form-group row mb-0">
								<label for="nip_baru" class="col-md-4 col-form-label">NIP</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->nipBaru ?? '-' }}" placeholder="NIP">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="nip_lama" class="col-md-4 col-form-label">NIP LAMA</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->nipBama ?? '-' }}" placeholder="NIP Lama">
								</div>
							</div>
							<div class="form-group row mb-0">
								<label for="nik" class="col-md-4 col-form-label">NIK/ NO KTP</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->nik ?? '-' }}" placeholder="NIK">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="nama" class="col-md-4 col-form-label">NAMA LENGKAP</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->nama ?? '-' }}" placeholder="Nama lengkap">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="gelarDepan" class="col-md-4 col-form-label">GELAR DEPAN</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->gelarDepan ?? '-' }}" placeholder="Gelar depan">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="gelarBelakang" class="col-md-4 col-form-label">GELAR BELAKANG</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->gelarBelakang ?? '-' }}" placeholder="Gelar belakang">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="tempat_lahir" class="col-md-4 col-form-label">TEMPAT &amp; TANGGAL LAHIR</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->tempatLahir ?? '-' }}, {{ tanggal($pegawai->tglLahir, 'd F Y') }}" placeholder="Tempat, tanggal lahir">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="jenis_kelamin" class="col-md-4 col-form-label">JENIS KELAMIN</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="@if($pegawai->jenisKelamin == 'M')LAKI-LAKI @elseif($pegawai->jenisKelamin == 'F')PEREMPUAN @else - @endif" placeholder="Jenis kelamin">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="agama" class="col-md-4 col-form-label">AGAMA</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->agama ?? '-' }}" placeholder="Agama">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="golongan_darah" class="col-md-4 col-form-label">GOLONGAN DARAH</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->golongan_darah ?? '-' }}" placeholder="Golongan darah">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="status_nikah" class="col-md-4 col-form-label">STATUS PERNIKAHAN</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->status_nikah ?? '-' }}" placeholder="Status pernikahan">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="telepon" class="col-md-4 col-form-label">NO TELEPON</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->telepon ?? '-' }}" placeholder="Nomor telepon">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="email" class="col-md-4 col-form-label">EMAIL</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->email ?? '-' }}" placeholder="Email">
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="alamat" class="col-md-4 col-form-label">ALAMAT</label>
								<div class="col-md-8">
									<textarea name="alamat" class="form-control-plaintext" readonly="" rows="3" placeholder="Alamat">{{ $pegawai->alamat ?? '-' }}</textarea>
								</div>
							</div>

							<div class="form-group row mb-0">
								<label for="kode_pos" class="col-md-4 col-form-label">KODE POS</label>
								<div class="col-md-8">
									<input type="text" class="form-control-plaintext" readonly="" value="{{ $pegawai->kode_pos ?? '-' }}" placeholder="Kode pos">
								</div>
							</div>
						</form>
					</div>
					<!-- ./card-body -->
				</div>
				<!-- End Data Pegawai -->

				<div class="card card-primary">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<small><strong>NO KARPEG</strong></small>
								<p class="text-muted">{{ $pegawai->noSeriKarpeg ? $pegawai->noSeriKarpeg : '-' }}</p><hr>

								<small><strong>NO KK</strong></small>
								<p class="text-muted">{{ $pegawai->kk ?? '-' }}</p>
							</div>
							<div class="col-md-4">
								<small><strong>NO NPWP</strong></small>
								<p class="text-muted">{{ $pegawai->noNpwp ? $pegawai->noNpwp : '-' }}</p><hr>

								<small><strong>NO @if($pegawai->jenisKelamin == "M")KARIS @else KARSU @endif</strong></small>
								<p class="text-muted">{{ $pegawai->karis_karsu ?? '-' }}</p>
							</div>
							<div class="col-md-4">
								<small><strong>NO BPJS</strong></small>
								<p class="text-muted">{{ $pegawai->bpjs ? $pegawai->bpjs : '-' }}</p><hr>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<!-- Riwayat Jabatan -->
		{{-- @include('admin.pegawai.riwayat_jabatan') --}}
		<!-- End Riwayat Jabatan -->

		<!-- Riwayat Pendidikan -->
		{{-- @include('admin.pegawai.riwayat_pendidikan') --}}
		<!-- End Riwayat Pendidikan -->
	</div>
</div>
@endsection