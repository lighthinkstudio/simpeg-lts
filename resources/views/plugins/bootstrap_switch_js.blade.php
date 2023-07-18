<!-- Select2 -->
<script src="{{ asset('assets/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<!-- page script -->
<script>
  $(document).ready(function () {
    $("input[data-bootstrap-switch]").bootstrapSwitch({
      onSwitchChange: function(e, state) { 
        if(state == false)
        {
          $('#komen').val('close');
        }
        else
        {
          $('#komen').val('open');
        }
      }
    });
  });
</script>