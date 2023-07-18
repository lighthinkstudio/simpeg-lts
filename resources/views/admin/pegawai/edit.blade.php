@extends('admin.layouts.adminlte.app')

@section('content')
@include('admin.layouts.assets.jquery-ui_css')
<style>
#imagePreview {
    width: 150px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
#imagePreview img {
    width: 150px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
	display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#foto").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            $( "img" ).remove();
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<form action="{{ route('admin.update_pegawai', $data_pegawai->bkn_id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="card-body bg-primary">
					<h4 class="card-tittle text-center">Data Pribadi</h4>
				</div>
				<div class="card-body">
					<a href="{{ route('admin.pegawai') }}" class="btn btn-secondary float-right">
						<i class="fas fa-backward"></i> Kembali
					</a>
				</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="imagePreview" class="col-md-4"></label>
						<div class="col-md-8">
							<div id="imagePreview">
								<img src="@if(!empty($data_pegawai->foto)) {{ asset('storage/assets/uploads/images/' . $data_pegawai->foto) }} @endif" alt="{{ $data_pegawai->nama_pegawai }}">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="foto" class="col-md-4">FOTO</label>
						<div class="col-md-8">
							<input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
							@error('foto')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="bkn_id" class="col-md-4">ID BKN</label>
						<div class="col-md-8">
							<input type="text" name="bkn_id" class="form-control @error('bkn_id') is-invalid @enderror" value="{{ $data_pegawai->bkn_id }}" placeholder="ID BKN">
							@error('bkn_id')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="nip_lama" class="col-md-4">Nip Lama/ Nip Baru</label>
						<div class="col-md-4">
							<input type="text" name="nip_lama" class="form-control @error('nip_lama') is-invalid @enderror" value="{{ $data_pegawai->nip_lama }}" placeholder="Nip Lama">
							@error('nip_lama')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-4">
							<input type="text" name="nip_baru" class="form-control @error('nip_baru') is-invalid @enderror" value="{{ $data_pegawai->nip_baru }}" placeholder="Nip Baru">
							@error('nip_baru')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_pegawai" class="col-md-4">Nama Pegawai</label>
						<div class="col-md-8">
							<input type="text" name="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" value="{{ $data_pegawai->nama_pegawai }}" placeholder="Nama Pegawai">
							@error('nama_pegawai')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="gelar_depan" class="col-md-4">Gelar Depan/ Gelar Belakang</label>
						<div class="col-md-4">
							<input type="text" name="gelar_depan" class="form-control @error('gelar_depan') is-invalid @enderror" value="{{ $data_pegawai->gelar_depan }}" placeholder="Gelar Depan">
							@error('gelar_depan')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-4">
							<input type="text" name="gelar_belakang" class="form-control @error('gelar_belakang') is-invalid @enderror" value="{{ $data_pegawai->gelar_belakang }}" placeholder="Gelar Belakang">
							@error('gelar_belakang')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="tempat_lahir" class="col-md-4">Tempat/ Tanggal Lahir</label>
						<div class="col-md-4">
							<input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ $data_pegawai->tempat_lahir }}" placeholder="Tempat Lahir">
							@error('tempat_lahir')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-4">
							<input type="text" name="tanggal_lahir" class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror" value="{{ date('d-m-Y', strtotime($data_pegawai->tanggal_lahir)) }}" placeholder="DD-MM-YYYY" readonly="">
							@error('tanggal_lahir')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="jenis_kelamin" class="col-md-4">Jenis Kelamin</label>
						<div class="col-md-8">
							<select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
								<option value="">Pilih Jenis Kelamin</option>
								<option value="M" @if($data_pegawai->jenis_kelamin == "M") selected @endif>Laki-laki</option>
								<option value="F" @if($data_pegawai->jenis_kelamin == "F") selected @endif>Perempuan</option>
							</select>
							@error('jenis_kelamin')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="agama" class="col-md-4">Agama</label>
						<div class="col-md-8">
							<select name="agama" class="form-control @error('agama') is-invalid @enderror">
								<option value="">Pilih Agama</option>
								<option value="Islam" @if($data_pegawai->agama == "Islam") selected @endif>Islam</option>
								<option value="Kristen" @if($data_pegawai->agama == "Kristen") selected @endif>Kristen</option>
								<option value="Katholik" @if($data_pegawai->agama == "Katholik") selected @endif>Katholik</option>
								<option value="Hindu" @if($data_pegawai->agama == "Hindu") selected @endif>Hindu</option>
								<option value="Budha" @if($data_pegawai->agama == "Budha") selected @endif>Budha</option>
								<option value="Lainnya" @if($data_pegawai->agama == "Lainnya") selected @endif>Lainnya</option>
							</select>
							@error('agama')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="status_nikah" class="col-md-4">Status Perkawinan</label>
						<div class="col-md-8">
							<select name="status_nikah" class="form-control @error('status_nikah') is-invalid @enderror">
								<option value="">Pilih Status Pernikahan</option>
								<option value="Belum Kawin" @if($data_pegawai->status_nikah == "Belum Kawin") selected @endif>Belum Kawin</option>
								<option value="Menikah" @if($data_pegawai->status_nikah == "Menikah") selected @endif>Menikah</option>								
								<option value="Janda / Duda" @if($data_pegawai->status_nikah == "Janda / Duda") selected @endif>Janda / Duda</option>
							</select>
							@error('status_nikah')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>					
					<div class="form-group row">
						<label for="telepon" class="col-md-4">Telepon / Email</label>
						<div class="col-md-4">
							<input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ $data_pegawai->telepon }}" placeholder="Nomor Telepon">
							@error('telepon')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-4">
							<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data_pegawai->email }}" placeholder="Alamat Email">
							@error('email')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-md-4">Alamat</label>
						<div class="col-md-8">
							<textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">{{ $data_pegawai->alamat }}</textarea>
							@error('alamat')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="karpeg" class="col-md-4">No Karpeg/ No Karis/Karsu</label>
						<div class="col-md-4">
							<input type="text" name="karpeg" class="form-control @error('karpeg') is-invalid @enderror" value="{{ $data_pegawai->karpeg }}" placeholder="No Karpeg">
							@error('karpeg')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-4">
							<input type="text" name="karis_karsu" class="form-control @error('karis_karsu') is-invalid @enderror" value="{{ $data_pegawai->karis_karsu }}" placeholder="No Karis/Karsu">
							@error('karis_karsu')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
				</div>
				<div class="card-body bg-warning">
					<h4 class="card-tittle text-center text-white">Data Informasi Lainnya</h4>
				</div>
				<div class="card-body">
					<a href="{{ route('admin.pegawai') }}" class="btn btn-secondary float-right">
						<i class="fas fa-backward"></i> Kembali
					</a>
				</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="status_pegawai" class="col-md-4">Status Pegawai</label>
						<div class="col-md-8">
							<select name="status_pegawai" class="form-control @error('status_pegawai') is-invalid @enderror">
								<option value="Aktif">Aktif</option>
								<option value="Pensiun">Pensiun</option>
							</select>
							@error('status_pegawai')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="sk_cpns" class="col-md-4">No SK CPNS / Tgl SK CPNS / TMT CPNS</label>
						<div class="col-md-4">
							<input type="text" name="sk_cpns" class="form-control @error('sk_cpns') is-invalid @enderror" value="{{ $data_pegawai->sk_cpns }}" placeholder="No SK CPNS">
							@error('sk_cpns')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-2">
							<input type="text" name="tanggal_sk_cpns" class="form-control datepicker @error('tanggal_sk_cpns') is-invalid @enderror" value="{{ date('d-m-Y', strtotime($data_pegawai->tanggal_sk_cpns)) }}" placeholder="DD-MM-YYYY" readonly="">
							@error('tanggal_sk_cpns')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-2">
							<input type="text" name="tmt_cpns" class="form-control datepicker @error('tmt_cpns') is-invalid @enderror" value="{{ date('d-m-Y', strtotime($data_pegawai->tmt_cpns)) }}" placeholder="DD-MM-YYYY" readonly="">
							@error('tmt_cpns')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="sk_pns" class="col-md-4">No SK PNS / Tgl SK PNS / TMT PNS</label>
						<div class="col-md-4">
							<input type="text" name="sk_pns" class="form-control @error('sk_pns') is-invalid @enderror" value="{{ $data_pegawai->sk_pns }}" placeholder="No SK PNS">
							@error('sk_pns')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-2">
							<input type="text" name="tanggal_sk_pns" class="form-control datepicker @error('tanggal_sk_pns') is-invalid @enderror" value="{{ date('d-m-Y', strtotime($data_pegawai->tanggal_sk_pns)) }}" placeholder="DD-MM-YYYY" readonly="">
							@error('tanggal_sk_pns')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-2">
							<input type="text" name="tmt_pns" class="form-control datepicker @error('tmt_pns') is-invalid @enderror" value="{{ date('d-m-Y', strtotime($data_pegawai->tmt_pns)) }}" placeholder="DD-MM-YYYY" readonly="">
							@error('tmt_pns')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="mk_tahun" class="col-md-4">Masa Kerja Pegawai Tahun / Bulan</label>
						<div class="col-md-4">
							<input type="text" name="mk_tahun" class="form-control @error('mk_tahun') is-invalid @enderror" value="{{ $data_pegawai->mk_tahun }}" placeholder="Masa Kerja Tahun">
							@error('mk_tahun')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-4">
							<input type="mk_bulan" name="mk_bulan" class="form-control @error('mk_bulan') is-invalid @enderror" value="{{ $data_pegawai->mk_bulan }}" placeholder="Masa Kerja Bulan">
							@error('mk_bulan')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="nik" class="col-md-4">No KTP/ No Kartu Keluarga</label>
						<div class="col-md-4">
							<input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ $data_pegawai->nik }}" placeholder="No KTP">
							@error('nik')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-4">
							<input type="text" name="kk" class="form-control @error('kk') is-invalid @enderror" value="{{ $data_pegawai->kk }}" placeholder="No Kartu Keluarga">
							@error('kk')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="npwp" class="col-md-4">No NPWP / No. BPJS</label>
						<div class="col-md-4">
							<input type="text" name="npwp" class="form-control @error('npwp') is-invalid @enderror" value="{{ $data_pegawai->npwp }}" placeholder="No NPWP">
							@error('npwp')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
						<div class="col-md-4">
							<input type="text" name="bpjs" class="form-control @error('bpjs') is-invalid @enderror" value="{{ $data_pegawai->bpjs }}" placeholder="No. BPJS">
							@error('bpjs')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="golongan_darah" class="col-md-4">Golongan Darah</label>
						<div class="col-md-8">
							<select name="golongan_darah" class="form-control @error('golongan_darah') is-invalid @enderror">
								<option value="A" @if($data_pegawai->golongan_darah == "A") selected @endif>A</option>
								<option value="B" @if($data_pegawai->golongan_darah == "B") selected @endif>B</option>
								<option value="AB" @if($data_pegawai->golongan_darah == "AB") selected @endif>AB</option>
								<option value="O" @if($data_pegawai->golongan_darah == "O") selected @endif>O</option>
							</select>
							@error('golongan_darah')
							<em class="text-danger">{{ $message }}</em>
							@enderror
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="form-group row">
						<div class="col-md-8 offset-4">
							<a href="{{ route('admin.pegawai') }}" class="btn btn-default">
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
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@include('admin.layouts.assets.jquery-ui_js')
@endsection