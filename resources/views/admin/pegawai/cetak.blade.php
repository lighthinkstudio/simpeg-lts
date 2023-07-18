<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="{{ asset('assets/css/print.css') }}" media="print">
	<link rel="stylesheet" href="{{ asset('assets/css/print.css') }}" media="screen">
</head>
<body>
	<div class="cetak">
		<h3 class="text-center">REKAP DATA KATEGORI</h3>

		<table class="printer">
			<thead>
				<tr>
					<th width="5%" align="center">No</th>
					<th width="70%" align="center">Nama</th>
					<th width="25%" align="center">Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($kategori as $no => $kategori)
				<tr>
					<td align="center">{{ $no + 1 }}</td>
					<td>{{ $kategori->nama_kategori }}</td>
					<td align="center">{{ $kategori->status }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>
