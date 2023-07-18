<!-- jQuery UI JS -->
<script src="{{ asset('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- page script -->
@php
$sekarang = date('Y');
$awal = $sekarang - 100;
@endphp
<script type="text/javascript">
	$( function() {
		$(".datepicker").datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true,
			yearRange: "{{ $awal }}:{{ $akhir = date('Y')+2 }}"
		});
	});
</script>