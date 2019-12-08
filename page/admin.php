<?php
    if ($role == 'Admin') {
        if (isset($_GET['v'])) {
            $view = $_GET['v'];
        } else {
            $view = '';
        }
    }
    
?>
<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed wide sn-bg-1">
  <ul class="custom-scrollbar">
    <!-- Logo -->
    <li>
      <div class="logo-wrapper sn-ad-avatar-wrapper">
        <h4 class="h4 my-2 ml-2">Panel Admin</h4>
      </div>
    </li>
    <!--/. Logo -->
    <!-- Side navigation links -->
    <li>
      <ul class="collapsible collapsible-accordion">
        <li><a class="collapsible-header waves-effect arrow-r active"><i
              class="sv-slim-icon fas fa-user"></i>
            User<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#" class="waves-effect active">
                  <span class="sv-slim"> D </span>
                  <span class="sv-normal">Dosen</span></a>
              </li>
              <li><a href="#" class="waves-effect">
                  <span class="sv-slim"> M </span>
                  <span class="sv-normal">Mahasiswa</span></a>
              </li>
            </ul>
          </div>
        </li>
        
        <li><a class=" waves-effect arrow-r" href="?p=admin&v=course"><i class="sv-slim-icon fas fa-layer-group"></i>
            Mata Kuliah</a>
        <li><a id="toggle" class="waves-effect"><i class="sv-slim-icon fas fa-angle-double-left"></i>Minimize
            menu</a>
        </li>
      </ul>
    </li>
    <!--/. Side navigation links -->
  </ul>
  <div class="sidenav-bg rgba-blue-strong"></div>
</div>
<!--/. Sidebar navigation -->

<?php
    // check if page file doesn't exist
    if (!file_exists('page/admin/'.$view.'.php')) {
        $view = 'course';
    }

    //include view
    include 'page/admin/'.$view.'.php';
?>