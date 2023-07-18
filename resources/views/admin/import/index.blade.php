@extends('admin.layouts.adminlte.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			@include('admin.import.pegawai')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			@include('admin.import.golongan')
		</div>
		<div class="col-lg-6">
			@include('admin.import.kpkn')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			@include('admin.import.jenis_jabatan')
		</div>
		<div class="col-lg-6">
			@include('admin.import.jabatan')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			@include('admin.import.jenis_pegawai')
		</div>
		<div class="col-lg-6">
			@include('admin.import.kedudukan_hukum')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			@include('admin.import.lokasi_kerja')
		</div>
		<div class="col-lg-6">
			@include('admin.import.instansi_kerja')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			@include('admin.import.satuan_kerja')
		</div>
		<div class="col-lg-6">
			@include('admin.import.unit_kerja')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			@include('admin.import.jenis_unit_organisasi')
		</div>
		<div class="col-lg-6">
			@include('admin.import.unit_organisasi')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			@include('admin.import.tingkat_pendidikan')
		</div>
		<div class="col-lg-6">
			@include('admin.import.pendidikan')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			@include('admin.import.agama')
		</div>
		<div class="col-lg-6">
			@include('admin.import.jenis_kawin')
		</div>
	</div>
</div>
@endsection