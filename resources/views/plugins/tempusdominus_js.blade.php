<!-- Tempus Dominus JS -->
<script src="{{ asset('assets/adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- page script -->
<script type="text/javascript">
	$(function () {
		$('#datetimepicker4').datetimepicker({
			format: 'DD-MM-YYYY',
			ignoreReadonly: true,
		});
	});
</script>