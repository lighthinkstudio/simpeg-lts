<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>LIGHTHINK STUDIO - {{ konfigurasi('singkatan')->deskripsi ?? '' }}{{ '('. konfigurasi('nama')->deskripsi .')' ?? '' }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}"/>
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logo/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logo/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logo/favicon-16x16.png') }}">

  <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/adminlte/dist/css/adminlte.min.css?v=3.2.0') }}" rel="stylesheet">
  
  <script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <style>
    .nav-treeview .nav-icon {
      font-size: 0.8rem !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    @include('admin.layouts.adminlte.navbar')

    @include('admin.layouts.adminlte.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>{{ $title ?? '' }}</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Alert Success -->
          @if($success = Session::get('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $success }}
          </div>
          @endif
          <!-- End Alert Success -->

          <!-- Alert Success -->
          @if($warning = Session::get('warning'))
          <div class="alert alert-warning alert-dismissible text-white">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $warning }}
          </div>
          @endif
          <!-- End Alert Success -->

          <!-- Alert Danger -->
          @if($danger = Session::get('danger'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $danger }}
          </div>
          @endif
          <!-- End Alert Danger -->

          @yield('content')
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.adminlte.footer')

  </div>
  <!-- ./wrapper -->


  <!-- Scripts -->
  <script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js?v=3.2.0') }}" defer></script>

  <script>
    // Tooltip
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });

    // Add active class and stay opened when selected
    var url = '<?php echo url()->current(); ?>';

    // Sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function(){
      return this.href == url;
    }).addClass('active');

    // Treeview
    $('ul.nav-treeview a').filter(function(){
      return this.href == url;
    }).parentsUntil(".nav-item .has-treeview").addClass('menu-open').prev('a').addClass('active');

    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks)
      {
        //Uncheck all checkboxes
        $('.data-list-check input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      }
      else
      {
        //Check all checkboxes
        $('.data-list-check input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })
  </script>
</body>
</html>