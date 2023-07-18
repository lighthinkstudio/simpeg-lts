		<div class="card card-primary card-outline collapsed-card">
			<div class="card-header">
				<h5 class="card-title">RIWAYAT JABATAN</h5>

				<div class="card-tools">
					<a href="{{ route('admin.riwayat_jabatan', $data_pegawai->nip_baru)}}" class="btn btn-sm btn-tool text-primary">
						<i class="fas fa-external-link-alt"></i> KELOLA RIWAYAT JABATAN
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
				<table class="table table-bordered table-hover table-sm">
					<thead>
						<tr>
							<th class="text-center" width="5%">NO.</th>
							<th width="10%">TMT JABATAN</th>
							<th>JABATAN</th>
							<th>JENIS JABATAN</th>
							<th>ESELON</th>
							<th>SATUAN KERJA</th>
							<th>UNIT KERJA</th>
						</tr>
					</thead>
					<tbody>
						@foreach($riwayat_jabatan as $no => $data)
						<tr>
							<td>{{ $no }}</td>
							<td>{{ date('d-m-Y', strtotime($data->tmt_jabatan)) }}</td>
							<td>{{ $data->nama_jabatan }}</td>
							<td>{{ $data->nama_jenis_jabatan }}</td>
							<td>{{ $data->nama_eselon }}</td>
							<td>{{ $data->nama_satker }}</td>
							<td>{{ $data->nama_unor }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- ./card-body -->
		</div>