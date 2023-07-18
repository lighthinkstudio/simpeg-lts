			<div class="card">
				<div class="card-header bg-primary">
					<h5>
						TINGKAT PENDIDIKAN
						<a href="#" class="btn btn-sm btn-warning float-right">
							<i class="fa-solid fa-external-link"></i> Lihat Data
						</a>
					</h5>
				</div>
				<form action="{{ route('admin.import_tingkat_pendidikan') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group pt-3">
							<div class="input-group">
								<input type="file" name="tingkat_pendidikan" class="form-control @error('tingkat_pendidikan') is-invalid @enderror" id="tingkat_pendidikan">
								<div class="input-group-append">
									<button type="submit" class="btn btn-success">
										<i class="fa-solid fa-file-import"></i> IMPORT
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="card-footer"></div>
			</div>