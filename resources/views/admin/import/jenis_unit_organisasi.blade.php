			<div class="card">
				<div class="card-header bg-primary">
					<h5>
						JENIS UNIT ORGANISASI
						<a href="#" class="btn btn-sm btn-warning float-right">
							<i class="fa-solid fa-external-link"></i> Lihat Data
						</a>
					</h5>
				</div>
				<form action="{{ route('admin.import_jenis_unit_organisasi') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group pt-3">
							<div class="input-group">
								<input type="file" name="jenis_unit_organisasi" class="form-control @error('jenis_unit_organisasi') is-invalid @enderror" id="jenis_unit_organisasi">
								<div class="input-group-append">
									<button type="submit" class="btn btn-success">
										<i class="fa-solid fa-file-import"></i> IMPORT
									</button>
								</div>
							</div>
							@error('jenis_unit_organisasi')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
				</form>
				<div class="card-footer"></div>
			</div>