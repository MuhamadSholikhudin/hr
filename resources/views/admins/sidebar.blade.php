<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('/img/HR System.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HRD IT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <?php
               $sess_role_id = auth()->user()->role_id;
               $access_menus = DB::table('access_menus')
                  ->rightJoin('menus', 'access_menus.menu_id', '=', 'menus.id')
                  ->where('access_menus.role_id', $sess_role_id)
                  ->select('access_menus.id as id', 'access_menus.menu_id as menu_id')
                  ->get();
               foreach($access_menus as $acs):
                $menu = DB::table('menus')->find($acs->menu_id);
                $sub_menus = DB::table('sub_menus')->where('menu_id', $acs->menu_id)->get();
             ?>
               <li class="nav-item  @foreach($sub_menus as $sub_menu):  <?php $url_menu = $sub_menu->url; $url_1 = substr($url_menu, 1); $open_url = $url_1.'*'; ?> {{Request::is($open_url) ?  'menu-open' : ''}} @endforeach">
                 <a href="#" class="nav-link ">
                   <?php 
                      if($menu->menu == "Dashboard"){ echo '<i class="nav-icon fas fa-gauge"></i>'; }
                      elseif($menu->menu == "Datamaster") { echo '<i class="nav-icon fas fa-database"></i>'; }
                      elseif($menu->menu == "Resign") { echo '<i class="nav-icon fas fa-list"></i>'; }
                      elseif($menu->menu == "Report") { echo '<i class="nav-icon fas fa-list"></i>'; }
                      elseif($menu->menu == "Management Access") { echo '<i class="nav-icon fas fa-list"></i>'; }
                   ?>
                   <p>
                     {{ $menu->menu }}
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                 <?php
                   foreach($sub_menus as $sub_menu):
                 ?>
                  <?php $method = DB::table('methods')->where('access_menu_id', $acs->id)->where('sub_menu_id',  $sub_menu->id)->where('view',  'true')->count(); ?>
                    <?php if($method == 1){ ?>
                      <li class="nav-item">
                        <a href="{{$sub_menu->url}}" 
                          class="nav-link <?php $url_s = substr($sub_menu->url, 1); $open_url_s = $url_s.'*'; ?> {{ Request::is($open_url_s) ? 'active' : '' }} ">
                          <i class="{{$sub_menu->icon}} nav-icon"></i>
                          <p>{{$sub_menu->title}}   </p>
                        </a>
                      </li>
                    <?php }else{ ?>
                    <?php } ?>
                 <?php
                   endforeach;
                 ?>
           </ul>
         </li>
        <?php
          endforeach;
        ?>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
