<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('Dashboard1/');?>" class="brand-link">
      <img src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Jaring</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url('Dashboard1/');?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('Dashboard1/pendukung');?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Pendukung
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('Dashboard1/hasiltim');?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Hasil Tim
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('Dashboard1/petasuara');?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Peta Suara
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('Dashboard1/quickcount');?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Quick Count
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('Dashboard1/detailqc');?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Detail Quick Count
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
