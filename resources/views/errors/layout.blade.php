<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>{{ konfigurasi('singkatan')->deskripsi ?? 'LIGHTHINK STUDIO' }}{{ ' - '. $title ?? '' }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}"/>
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logo/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logo/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logo/favicon-16x16.png') }}">

  <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/adminlte/dist/css/adminlte.min.css?v=3.2.0') }}" rel="stylesheet">
  
  <script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
</head>
<body class="hold-transition login-page">
    <div class="wrapper mt-5" style="margin-top: 10% !important;">
        <div class="container mt-5">
            @yield('content')
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js?v=3.2.0') }}" defer></script>
</body>
</html>