<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HRD | IT</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <style>
    .login-page {
      background-image: url("{{ asset('img/View.jpg') }}");
      /* background-color: #cccccc; */
      /* width: 500px; */
      /* background-size: auto; */
      background-size: 100%;
    }
  
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="{{ asset('index2.html') }}">
       
    
    <b>HRD</b> IT
  </a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">

  <?php
    // echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "<br>";
    // echo $jumlah_karakter = strlen($actual_link);
    echo "<br>";
    // Program to display current page URL.
    // $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // echo $link;

  ?>
    <div class="card-body login-card-body">

    @if(session()->has('loginError'))

      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        {{ session('loginError') }}
      </div>
    @endif

      <div class="login-box-msg" >
      <a href="/login">
        <img src="{{ asset('img/HR System.png') }}" onclick="myFunction()" alt="" srcset="" width="150px"> 
      
      </a>


      </div>

      <p class="login-box-msg">Masuk Untuk Mulai Bekerja </p>

      <form action="/login" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" onclick="myFunction()" placeholder="name" name="name" value="{{ old('name') }}"  >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

          @error('name') {{$message}} @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script>

</script>
</body>
</html>
