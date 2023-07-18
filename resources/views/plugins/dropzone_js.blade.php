<!-- Dropzone JS -->
<script src="<?php echo base_url(); ?>/assets/dropzone/dist/min/dropzone.min.js"></script>
<script>
  // "myAwesomeDropzone" is the camelized version of the HTML element's ID
  Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    // maxFilesize: 2, // MB
    uploadMultiple: true,
    errorMultiple: function(file, response) {
      alert('Oops');
    }
  };
</script>