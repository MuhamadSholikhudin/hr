  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="width:1000px;">
       <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

      <marquee><h2 class="text-white"> HUMAN RESOURCE INFORMATION SYSTEM PT HWASEUNG INDONESIA</h2></marquee >
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?php 
      // $sess_role_id = auth()->user()->role_id;

      // if($sess_role_id == 1){
      //   $count_histories = DB::table('histories')->count();
      //   $m_histories = DB::table('histories')
      //     ->latest()
      //     ->limit(5)
      //     ->get();
      // }else{
      //   $count_histories = DB::table('histories')->where('role_id', $sess_role_id)->count();
      //   $m_histories = DB::table('histories')
      //     ->latest()
      //     ->where('role_id', $sess_role_id)
      //     ->limit(5)
      //     ->get();
      // }
      ?>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comment"></i>
              <span class="badge badge-danger navbar-badge"></span>
            </a>
            
          </li>
            <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-sign-out"></i>
          {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          {{-- <span class="dropdown-item dropdown-header">15 Notifications</span> --}}
          {{-- <div class="dropdown-divider"></div> --}}
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item">
              <i class="fas fa-sign-out mr-2"></i> SIGN OUT
            </button>
          </form>
{{-- 
          <span class="float-right text-muted text-sm">3 mins</span>
          <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a> --}}
          <div class="dropdown-divider"></div> 
       
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->