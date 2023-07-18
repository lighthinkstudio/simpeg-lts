<div class="modal fade" id="Import">
	<div class="modal-dialog" style=" margin-top: 10%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Import Data Pegawai</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('admin.import_pegawai') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<div class="form-group mt-3">
						<div class="custom-file">
							<input type="file" name="import" class="custom-file-input @error('import') is-invalid @enderror" value="{{ old('import') }}">
							<label class="custom-file-label" for="pegawai">Pilih file import</label>
						</div>
						@error('import')
						<em class="text-danger">{{ $message }}</em>
						@enderror
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
						<i class="fas fa-times"></i> Close
					</button>
					<button type="submit" name="submit" value="proses" class="btn btn-outline-success">
						<i class="fas fa-file-arrow-up"></i> Import Data
					</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->