<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HRD | HWI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">


  <link rel="icon" href="{{ asset('img/favicon.ico') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

                      {{-- TRIX EDOTIR --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/trix.css') }}">
  <script type="text/javascript" src="{{ asset('dist/js/trix.js') }}"></script>


</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    @include('admins.navbar')

    <!-- Main Sidebar Container -->
    @include('admins.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('container')
    <!-- /.content-wrapper -->

    <footer class="main-footer bg-dark">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.3-pre <span  id="jam"> </span>

        
        <script type="text/javascript">
            window.onload = function() {
                jam();
            }

            function jam() {
                var e = document.getElementById('jam'),
                    d = new Date(),
                    h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());
                e.innerHTML = h + ':' + m + ':' + s;
                setTimeout('jam()', 1000);

                var backperjam = h + ':' + m + ':' + s;

                if(backperjam == "10:33:25"){

                  document.location.href = "http://localhost/backup/autorefresh.php"

                }
            }

            function set(e) {
                e = e < 10 ? '0' + e : e;
                return e;
            }
        </script>

      </div>
      <strong>Copyright &copy; 2022-<?= date('Y') ?> </strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <!-- <script src="{{asset('plugins/jquery/jquery.js') }}"></script> -->
  <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>

  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js') }}"></script>


  <!-- jquery-validation -->
  <!-- <script src="{{asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>  -->

  <!-- Select2 -->
  <script src="{{asset('plugins/select2/js/select2.full.min.js') }}"></script>

  <!-- <script src=//code.jquery.com/jquery-3.5.1.min.js integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin=anonymous></script> -->

  <script src="{{ asset('dist/js/scriptdewe.js') }}"></script> 

</body>
</html>
