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
  <link rel="icon" type="image/x-icon" href="{{url('favicon.svg')}}">
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
        <li class="nav-item">
          <a class="nav-link"  href="{{url('user/logout')}}">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar  elevation-4 sidebar-light-primary">
      <!-- Brand Logo -->
      <a href="{{url('/')}}" class="brand-link">
        <img src="{{url('assets')}}/img/logo.png" alt="AdminLTE Logo" style="opacity: .8">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <!-- <img src="{{url('assets')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth()->user()->username}}</a>
          </div>
        </div>

        @php
        $seg1=request()->segment(1);
        $seg2=request()->segment(2);
        $seg3=request()->segment(3);
        @endphp

        <!-- Sidebar Menu -->
        <nav class="mt-2 pb-5">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{url('/')}}" class="nav-link @if($seg1=='') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item @if($seg1=='user' OR $seg1=='professional') menu-open @endif">
              <a href="#" class="nav-link  @if($seg1=='user' OR $seg1=='professional') active @endif">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/user')}}" class="nav-link @if($seg1=='user') active @endif">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Tamu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/professional')}}" class="nav-link @if($seg1=='professional') active @endif">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Praktisi</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item @if($seg1=='slider') menu-open @endif">
              <a href="#" class="nav-link @if($seg1=='slider') active @endif">
                <i class="nav-icon fas fa-image"></i>
                <p>
                  Banner
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('slider/homepage')}}" class="nav-link @if($seg1=='slider' AND $seg2=='homepage') active @endif">
                    <i class="nav-icon far fa-images"></i>
                    <p>Promotions</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('slider/product')}}" class="nav-link  @if($seg1=='slider' AND $seg2=='product') active @endif">
                    <i class="nav-icon fas fa-images"></i>
                    <p>Product</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item  @if($seg1=='category' AND $seg2=='service') menu-open @endif">
              <a href="#" class="nav-link  @if($seg1=='category' AND $seg2=='service') active @endif">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                  Kategori Jasa
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('category/service')}}" class="nav-link  @if($seg1=='category' AND $seg2=='service' AND $seg3!=='sub') active @endif">
                    <i class="nav-icon far fa-circle nav-icon"></i>
                    <p>Parent Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('category/service/sub')}}" class="nav-link  @if($seg1=='category' AND $seg2=='service' AND $seg3=='sub') active @endif">
                    <i class="nav-icon far fa-circle nav-icon"></i>
                    <p>Sub Kategori</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item  @if($seg1=='category' AND $seg2=='product') menu-open @endif">
              <a href="#" class="nav-link  @if($seg1=='category' AND $seg2=='product') active @endif">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                  Kategori Produk
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('category/product')}}" class="nav-link  @if($seg1=='category' AND $seg2=='product' AND $seg3!=='sub') active @endif">
                    <i class="nav-icon far fa-circle nav-icon"></i>
                    <p>Parent Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('category/product/sub')}}" class="nav-link  @if($seg1=='category' AND $seg2=='product' AND $seg3=='sub') active @endif">
                    <i class="nav-icon far fa-circle nav-icon"></i>
                    <p>Sub Kategori</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item  @if($seg1=='schedule' OR $seg1=='booked') menu-open @endif">
              <a href="#" class="nav-link  @if($seg1=='schedule' OR $seg1=='booked') active @endif">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Manage Schedule
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/schedule')}}" class="nav-link @if($seg1=='schedule') active @endif">
                    <i class="nav-icon far fa-circle nav-icon"></i>
                    <p>
                      Schedule
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('booked')}}" class="nav-link  @if($seg1=='booked') active @endif">
                    <i class="nav-icon far fa-circle nav-icon"></i>
                    <p>Booked</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{url('/review')}}" class="nav-link @if($seg1=='review') active @endif">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                  Manage Review
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/rating')}}" class="nav-link @if($seg1=='rating') active @endif">
                <i class="nav-icon far fa-star"></i>
                <p>
                  Manage Rating
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/event')}}" class="nav-link @if($seg1=='event') active @endif">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Manage Event
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/donation')}}" class="nav-link @if($seg1=='donation') active @endif">
               <i class="nav-icon fas fa-dollar-sign"></i>
               <p>
                Donation
              </p>
            </a>
          </li>
          <li class="nav-item  @if($seg1=='setting' OR $seg2=='faq') menu-open @endif">
            <a href="#" class="nav-link  @if($seg1=='category' AND $seg2=='product') active @endif">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('setting')}}" class="nav-link  @if($seg1=='setting') active @endif">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>General Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('faq')}}" class="nav-link  @if($seg1=='faq') active @endif">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
            </ul>
          </li>
<!--           <li class="nav-item">
            <a href="{{url('/setting')}}" class="nav-link @if($seg1=='setting') active @endif">
             <i class="nav-icon fas fa-cog"></i>
             <p>
              Setting
            </p>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
@yield('content');

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
<script>
  $(function () {
    $('#summernote').summernote()
    $('#about_us').summernote()
    $('#donation').summernote()
    $('#rek_information').summernote()
    $('#reservation').daterangepicker();
    $('#scheduleFilter').daterangepicker();
    $('#bookedFilter').daterangepicker();

    $('#reservation').on('apply.daterangepicker', function(ev, picker) {
      var startDate = picker.startDate.format('DD-MM-YYYY');
      var endDate = picker.endDate.format('DD-MM-YYYY');

      var dateRange = '';
      var currentDate = picker.startDate;
      while (currentDate <= picker.endDate) {
        dateRange += currentDate.format('DD-MM-YYYY') + '|';
        currentDate = currentDate.clone().add(1, 'days');
      }
  dateRange = dateRange.slice(0, -1); // Menghapus karakter '|' terakhir

  dataTable.column(4).search(dateRange, true, false).draw();
});

    $('#scheduleFilter').on('apply.daterangepicker', function(ev, picker) {
      var startDate = picker.startDate.format('DD-MM-YYYY');
      var endDate = picker.endDate.format('DD-MM-YYYY');

      var dateRange = '';
      var currentDate = picker.startDate;
      while (currentDate <= picker.endDate) {
        dateRange += currentDate.format('DD-MM-YYYY') + '|';
        currentDate = currentDate.clone().add(1, 'days');
      }
  dateRange = dateRange.slice(0, -1); // Menghapus karakter '|' terakhir

  dataTable.column(3).search(dateRange, true, false).draw();
});

    $('#bookedFilter').on('apply.daterangepicker', function(ev, picker) {
      var startDate = picker.startDate.format('DD-MM-YYYY');
      var endDate = picker.endDate.format('DD-MM-YYYY');

      var dateRange = '';
      var currentDate = picker.startDate;
      while (currentDate <= picker.endDate) {
        dateRange += currentDate.format('DD-MM-YYYY') + '|';
        currentDate = currentDate.clone().add(1, 'days');
      }
  dateRange = dateRange.slice(0, -1); // Menghapus karakter '|' terakhir

  dataTable.column(3).search(dateRange, true, false).draw();
});

  })
</script>
</body>
</html>
