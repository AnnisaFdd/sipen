    <body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion bg-pink" id="accordionSidebar"\>

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('hrd/dashboard') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-notes-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-1">SISTEM PENDUKUNG KEPUTUSAN</div>
      </a>
      <hr class="sidebar-divider my-0">
      <br />
      <!-- Divider -->
      <div class="bg-head">
          <h6 style="padding-top: 2%; margin-left: 9%;font-size: 10pt;">Home</h6>
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('hrd/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      

      <div class="bg-head">
          <h6 style="padding-top: 2%; margin-left: 9%; font-size: 10pt;">Kelola Data</h6>
      </div>


      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - Utilities Collapse Menu -->
      
      <!-- Kelola data Kriteria -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('hrd/kriteria') ?>">
          <i class="fas fa-file-alt"></i>
          <span>Kelola Data Kriteria</span></a>
      </li>

     <!-- Hasil Perhitungan Penilaian -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('hrd/hasil')?>">
          <i class="fas fa-chart-line"></i>
          <span>Hasil Perhitungan Penilaian</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $usernya["nama_user"]; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/shortcut.png')?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->