@extends('admins.main')

@section('container')
<div class="content-wrapper bg-dark">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php
          $num_sub_employees = DB::table('sub_menus')
              ->where('url', '/employees')
              ->count();
          if ($num_sub_employees > 0) {
              $print_sub_employees = DB::table('sub_menus')
                  ->where('url', '/employees')
                  ->first();
              $num_meth_employees = DB::table('methods')
                  ->leftJoin(
                      'access_menus',
                      'methods.access_menu_id',
                      'access_menus.id'
                  )
                  ->where('methods.sub_menu_id', $print_sub_employees->id)
                  ->where('access_menus.role_id', auth()->user()->role_id)
                  ->count();
              if ($num_meth_employees > 0) { ?>
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-white">
                      <div class="inner">
                        <?php $num_employees = DB::table('employees')->count(); ?>
                        <h3>{{$num_employees}}</h3>
                        <p>Total Karyawan</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person"></i>
                      </div>
                      <a href="/employees" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <?php } else {}
          }
          ?>
                  <?php
          $num_sub_employees = DB::table('sub_menus')
              ->where('url', '/employees')
              ->count();
          if ($num_sub_employees > 0) {
              $print_sub_employees = DB::table('sub_menus')
                  ->where('url', '/employees')
                  ->first();
              $num_meth_employees = DB::table('methods')
                  ->leftJoin(
                      'access_menus',
                      'methods.access_menu_id',
                      'access_menus.id'
                  )
                  ->where('methods.sub_menu_id', $print_sub_employees->id)
                  ->where('access_menus.role_id', auth()->user()->role_id)
                  ->count();
              if ($num_meth_employees > 0) { ?>
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <?php 
                            $num_employees_local = DB::table('employees')
                              ->count(); 
                        ?>
                        <h3>{{$num_employees_local}}</h3>
                        <p>Total Karyawan Lokal</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person"></i>
                      </div>
                      <a href="/employees" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <?php } else {}
          }
          ?>

      <?php
          $num_sub_employees = DB::table('sub_menus')
              ->where('url', '/employees')
              ->count();
          if ($num_sub_employees > 0) {
              $print_sub_employees = DB::table('sub_menus')
                  ->where('url', '/employees')
                  ->first();
              $num_meth_employees = DB::table('methods')
                  ->leftJoin(
                      'access_menus',
                      'methods.access_menu_id',
                      'access_menus.id'
                  )
                  ->where('methods.sub_menu_id', $print_sub_employees->id)
                  ->where('access_menus.role_id', auth()->user()->role_id)
                  ->count();
              if ($num_meth_employees > 0) { ?>
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <?php 
                          $num_employees_asing = DB::table('employees')
                          ->count(); 
                        ?>
                        <h3>{{$num_employees_asing}}</h3>
                        <p>Total Karyawan Asing</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person"></i>
                      </div>
                      <a href="/employees" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <?php } else {}
          }
          ?>

          <?php
          $num_sub_employees = DB::table('sub_menus')
              ->where('url', '/employees')
              ->count();
          if ($num_sub_employees > 0) {
              $print_sub_employees = DB::table('sub_menus')
                  ->where('url', '/employees')
                  ->first();
              $num_meth_employees = DB::table('methods')
                  ->leftJoin(
                      'access_menus',
                      'methods.access_menu_id',
                      'access_menus.id'
                  )
                  ->where('methods.sub_menu_id', $print_sub_employees->id)
                  ->where('access_menus.role_id', auth()->user()->role_id)
                  ->count();
              if ($num_meth_employees > 0) { ?>
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info2" style="background-color: #4baebd" >
                      <div class="inner">
                        <?php $active_employees = DB::table('employees')
                            ->where('status_employee', 'active')
                            ->count(); ?>
                        <h3  class="text-white">{{$active_employees}}</h3>
                        <p  class="text-white">Karyawan Local Aktif</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person"></i>
                      </div>
                      <a href="/employees" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <?php } else {}
          }
          ?>


          <?php
          $num_sub_employees = DB::table('sub_menus')
              ->where('url', '/employees')
              ->count();
          if ($num_sub_employees > 0) {
              $print_sub_employees = DB::table('sub_menus')
                  ->where('url', '/employees')
                  ->first();
              $num_meth_employees = DB::table('methods')
                  ->leftJoin(
                      'access_menus',
                      'methods.access_menu_id',
                      'access_menus.id'
                  )
                  ->where('methods.sub_menu_id', $print_sub_employees->id)
                  ->where('access_menus.role_id', auth()->user()->role_id)
                  ->count();
              if ($num_meth_employees > 0) { ?>
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info3" style="background-color: #4baebd">
                      <div class="inner">
                        <?php $active_employees = DB::table('employees')
                            ->where('status_employee', 'notactive')

                            ->count(); ?>
                        <h3  class="text-white">{{$active_employees}}</h3>
                        <p  class="text-white">Karyawan Local Resign</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person"></i>
                      </div>
                      <a href="/employees" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <?php } else {}
          }
          ?>

      <?php
          $num_sub_employees = DB::table('sub_menus')
              ->where('url', '/employees')
              ->count();
          if ($num_sub_employees > 0) {
              $print_sub_employees = DB::table('sub_menus')
                  ->where('url', '/employees')
                  ->first();
              $num_meth_employees = DB::table('methods')
                  ->leftJoin(
                      'access_menus',
                      'methods.access_menu_id',
                      'access_menus.id'
                  )
                  ->where('methods.sub_menu_id', $print_sub_employees->id)
                  ->where('access_menus.role_id', auth()->user()->role_id)
                  ->count();
              if ($num_meth_employees > 0) { ?>
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info3" style="background-color: #53858d">
                      <div class="inner">
                        <?php $active_employees = DB::table('employees')
                            ->where('hire_date',  date("Y-m-d"))
                            ->count(); ?>
                        <h3  class="text-white">{{$active_employees}}</h3>
                        <p  class="text-white">Hire hari ini</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person"></i>
                      </div>
                      <a href="/employees" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <?php } else {}
          }
          ?>

          <?php
          $num_sub_employees = DB::table('sub_menus')
              ->where('url', '/employees')
              ->count();
          if ($num_sub_employees > 0) {
              $print_sub_employees = DB::table('sub_menus')
                  ->where('url', '/employees')
                  ->first();
              $num_meth_employees = DB::table('methods')
                  ->leftJoin(
                      'access_menus',
                      'methods.access_menu_id',
                      'access_menus.id'
                  )
                  ->where('methods.sub_menu_id', $print_sub_employees->id)
                  ->where('access_menus.role_id', auth()->user()->role_id)
                  ->count();
              if ($num_meth_employees > 0) { ?>
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info3" style="background-color: #53858d">
                      <div class="inner">
                        <?php $active_employees = DB::table('employees')
                            ->where('status_employee', 'notactive')
                            ->where('date_out',  date("Y-m-d"))
                            ->count(); ?>
                        <h3  class="text-white">{{$active_employees}}</h3>
                        <p  class="text-white">Resign Hari ini</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person"></i>
                      </div>
                      <a href="/employees" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <?php } else {}
          }
          ?>

          <?php
          $num_sub_users = DB::table('sub_menus')
              ->where('url', '/users')
              ->count();
          if ($num_sub_users > 0) {
              $print_sub_users = DB::table('sub_menus')
                  ->where('url', '/users')
                  ->first();
              $num_meth_users = DB::table('methods')
                  ->leftJoin(
                      'access_menus',
                      'methods.access_menu_id',
                      'access_menus.id'
                  )
                  ->where('methods.sub_menu_id', $print_sub_users->id)
                  ->where('access_menus.role_id', auth()->user()->role_id)
                  ->count();
              if ($num_meth_users > 0) { ?>
                    <div class="col-lg-2 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                        <?php $num_users = DB::table('users')->count(); ?>
                          <h3>{{$num_users}}</h3>

                          <p>User Akses</p>
                        </div>
                        <div class="icon">
                          <i class="fa-solid fa-right-to-bracket"></i>
                        </div>
                        <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  <?php } else {}
          }
          ?>

        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
 

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection