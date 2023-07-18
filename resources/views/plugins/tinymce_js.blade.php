<!-- Select2 -->
<script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<!-- page script -->
<script>
  $(document).ready(function () {
    //Initialize TinyMCE
    tinymce.init({
      selector: 'textarea.editor',
      height: '220',
    });


    // 
    tinymce.init({
      selector: 'textarea.more-editor',
      plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link codesample table pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
      toolbar: 'undo redo | bold italic underline | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | numlist bullist | forecolor backcolor removeformat | pagebreak | link anchor',
      height: '300',
    });
  });
</script>