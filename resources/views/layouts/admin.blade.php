<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    @yield('title', 'Admin Dashboard')</title>
<link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
  @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  @include('admin.partials.navbar')


  @include('admin.partials.sidebar')


  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>


  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Версия</b> 1.0.0
    </div>
    <strong>&copy; {{ date('Y') }} <strong>Copyright 2025 </strong>Все права защищены.</strong>
  </footer>

</div>
</body>
</html>
