<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Brand Logo dist/img/AdminLTELogo.png -->
    <a href="<?= $base_url ?>" class="brand-link">
      <img src="<?= $base_url ?>dist/img/AdminLTELogo.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 33px;height: 33px;">
      <span class="brand-text font-weight-light">Templates</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?= $base_url?>admin/dashboard" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-down"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a  href="<?= $base_url?>admin/csv" class="nav-link ">
               <i class="fas fa-cogs nav-icon"></i>
              <p>
                CSV Import
              </p>
            </a>
          </li>    
          <li class="nav-item ">
            <a href="<?= $base_url?>admin/users" class="nav-link ">
               <i class="fas fa-users nav-icon"></i>
              <p>
                Users
              </p>
            </a>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

  </div>
<!-- ./wrapper -->
<script >

 var url = window.location;

    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

</script>