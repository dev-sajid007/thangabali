<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thangabali Dashboard</title>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
  <!-- Select 2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="/admin_assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin_assets/dist/css/adminlte.min.css">
  <!-- Toastr Notification style -->
  <link rel="stylesheet" href="/admin_assets/dist/css/toastr.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!--Datepicker-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
  <!-- summernote -->
  <link rel="stylesheet" href="/admin_assets/plugins/summernote/summernote-bs4.min.css">
   <!-- Datetable -->
   <link rel="stylesheet" href="/admin_assets/plugins/datatable/dataTables.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href=" {{url('/dashboard')}} ">
           {{ Auth::user()->name}}
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">

        <a  href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"class="dropdown-item dropdown-footer">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" {{url('/dashboard')}} " class="brand-link">
      <img width="190" src="/admin_assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" style="opacity:1;margin-left:18px">

    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color:black">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin_assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href=" {{url('/dashboard')}} " class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



          <li class="nav-item">
            <a href="#" class="nav-link">
                <i style="color: #007bff" class="fas fa-user mr-2"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{route('user.list')}} " class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i style="color: rgb(255, 174, 0)" class="fas fa-pizza-slice mr-2"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{route('menu.list')}} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Menu List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i style="color: aqua" class="fas fa-shopping-cart mr-2"></i>
              <p>
                Purchase
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{route('purchase.add')}} " class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Add Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{route('purchase.list')}} " class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Purchase List</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://nafiz.konika.online">Konika Admin</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin_assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin_assets/plugins/chart.js/Charrrrrrrrrrrrrrrrrrrrrrrrrrt.min.js"></script>
<!-- Sparkline -->
<script src="/admin_assets/plugins/sparklines/sparkline.js"></script>
<!-- Select 2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- JQVMap -->
<script src="/admin_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin_assets/plugins/moment/moment.min.js"></script>
<script src="/admin_assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin_assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jquery-validation -->
<script src="/admin_assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/admin_assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin_assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin_assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin_assets/dist/js/pages/dashboard.js"></script>
<!-- Toastr Notification -->
<script src="/admin_assets/dist/js/toastr.min.js"></script>
<!-- daterangepicker -->
<!-- Sweet Alert Notification -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="/admin_assets/plugins/moment/moment.min.js"></script>
{{-- daterangepicker --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!------Handlebar JS---------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.js"></script>
<!--  Data Table js -->
<script src="/admin_assets/dist/js/jquery.dataTables.min.js"></script>
<script src="/admin_assets/dist/js/dataTables.bootstrap4.min.js"></script>
@yield('script')
<script>
  $(function(){
    $('.select2').select2();
  });
</script>
{{-- JQUERY jquery-validation --}}
<script>
    $(function () {
    //   $.validator.setDefaults({
    //     submitHandler: function () {
    //       alert( "Form successful submitted!" );
    //     }
    //   });
      $('#quickForm').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          name: {
            required: true,
          },
          password: {
            required: true,
            minlength: 5
          },
          password2: {
            required: true,
            minlength: 5
          },
          terms: {
            required: true
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
{{-- //data table --}}
<script>
  $(document).ready(function() {
  $('#mydatatable').DataTable();
  } );
</script>



 {{-- toastr script --}}
 <script>
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

      {{-- ///sweet alert --}}
      <script>
        $(document).on('click','#delete',function(e){
              e.preventDefault();
              var link = $(this).attr("href");
              Swal.fire({
                  title: 'Are you sure?',
                  text: "Delete this data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = link;
                      Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                      )
                  }
              })
        });
      </script>
</body>
</html>
