<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <script src="{{ asset('js/jquery.js') }}"></script>

  <style>
  
    .drop-container {
      position: relative;
      display: flex;
      gap: 10px;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 200px;
      padding: 20px;
      border-radius: 10px;
      border: 2px dashed rgb(197, 195, 195);
      color: #444;
      cursor: pointer;
      transition: background .2s ease-in-out, border .2s ease-in-out;
    }

    .drop-container:hover {
      background: #eee;
      border-color: #111;
    }

    .drop-container:hover .drop-title {
      color: #222;
    }

    .drop-title {
      color: #444;
      font-size: 20px;
      font-weight: bold;
      text-align: center;
      transition: color .2s ease-in-out;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">
          <center><img src="{{ asset('img/logo2-white.png') }}" alt="AdminLTE Logo" width="150">
        </span> </center>
      </a>
      @include('BackEnd.partial.sidebar')
    </aside>
    @include('BackEnd.partial.topmenu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('container')
    </div>

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2023 <a href="/">eFoody Food and Delivery</a>.</strong> All rights
      reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
  <script>
    $(document).ready(function() {
            $('.select2').select2({
            dropdownParent: $('#addModal'),
            theme: 'bootstrap4'
        });
        
    });
    
$(document).ready(function() {
    $('.js-example-basic-single').select2({
      theme: 'bootstrap4'
    });
});
      </script>
</body>

</html>