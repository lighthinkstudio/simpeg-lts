		<div class="card card-primary card-outline collapsed-card">
			<div class="card-header">
				<h5 class="card-title">RIWAYAT PENDIDIKAN</h5>

				<div class="card-tools">
					<a href="{{ route('admin.riwayat_pendidikan', $data_pegawai->nip_baru)}}" class="btn btn-sm btn-tool text-primary">
						<i class="fas fa-external-link-alt"></i> KELOLA RIWAYAT PENDIDIKAN
					</a>

					<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-plus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover table-sm projects">
					<thead>
						<tr>
							<th rowspan="2" class="text-center" width="5%">NO.</th>
							<th rowspan="2" width="25%">PENDIDIKAN/ <br> NAMA SEKOLAH</th>
							<th rowspan="2" width="15%">TINGKAT <br> PENDIDIKAN</th>
							<th colspan="2" class="text-center">LULUS</th>
							<th rowspan="2">NOMOR IJAZAH</th>
							<th rowspan="2" class="text-center">PENDIDIKAN <br> PERTAMA</th>
							<th rowspan="2" class="text-center">DOKUMEN</th>
						</tr>
						<tr>
							<th class="text-center">TANGGAL</th>
							<th class="text-center">TAHUN</th>
						</tr>
					</thead>
					<tbody>
						@foreach($riwayat_pendidikan as $no => $data)
						<tr>
							<td class="text-center">{{ $no + 1 }}</td>
							<td>
								{{ $data->nama_pendidikan }} <br>
								{{ $data->nama_sekolah }}
							</td>
							<td>{{ $data->nama_tingkat_pendidikan }}</td>
							<td class="text-center">
								{{ date('d-m-Y', strtotime($data->tanggal_lulus)) }}
							</td>
							<td class="text-center">
								{{ $data->tahun_lulus }}
							</td>
							<td>
								{{ $data->nomor_ijazah }}
							</td>
							<td class="text-center">
								@if($data->pendidikan_pertama == "Ya")
								<span class="badge badge-success">{{ $data->pendidikan_pertama }}</span>
								@else
								-
								@endif
								
							</td>
							<td class="text-center">
								<div class="dropdown">
									<button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
										<i class="fas fa-file-pdf"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
										<button class="dropdown-item" type="button" data-toggle="modal" data-target="#Ijazah{{ $data->id }}">Ijazah</button>
										<button class="dropdown-item" type="button" data-toggle="modal" data-target="#Transkrip{{ $data->id }}">Transkrip Nilai</button>
									</div>
								</div>
							</td>
							@include('admin.riwayat_pendidikan.ijazah')
							@include('admin.riwayat_pendidikan.transkrip')
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- ./card-body -->
		</div>