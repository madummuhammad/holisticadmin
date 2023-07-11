<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin- Holistic Station</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/css/custom.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('assets')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar  elevation-4 sidebar-light-primary">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{url('assets')}}/img/logo.png" alt="AdminLTE Logo" style="opacity: .8">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{url('assets')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth()->user()->username}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{url('/')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/user')}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    {{$slot}}


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  @livewireScripts
  <!-- jQuery -->
  <script src="{{url('assets')}}/plugins/jquery/jquery.min.js"></script>
  <script src="{{url('assets')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="{{url('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('assets')}}/plugins/chart.js/Chart.min.js"></script>
  <script src="{{url('assets')}}/plugins/sparklines/sparkline.js"></script>
  <script src="{{url('assets')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="{{url('assets')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="{{url('assets')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="{{url('assets')}}/plugins/moment/moment.min.js"></script>
  <script src="{{url('assets')}}/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="{{url('assets')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="{{url('assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="{{url('assets')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="{{url('assets')}}/dist/js/adminlte.js"></script>
  <script src="{{url('assets')}}/dist/js/demo.js"></script>
  <script src="{{url('assets')}}/dist/js/pages/dashboard.js"></script>
</body>
</html>