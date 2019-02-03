  <body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">MJS Bali</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MJS Bali</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
       
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>assets/dist/img/avatar2.png" class="user-image" alt="User Image">
              <span class="hidden-xs" style="text-transform: capitalize;"><?php echo $this->session->nama ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>assets/dist/img/avatar2.png" class="img-circle" alt="User Image">
                <p>
                  <strong style="text-transform: capitalize;"><?php echo $this->session->nama_user ?></strong><br>
                  
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url() ?>admin/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="text-transform: capitalize;"><?php echo "admin" ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>  

        
        <!-- MENU HOME -->

        <li class="<?php echo $menu == "home" ? "active" : '' ?>">
          <a href="<?php echo base_url() ?>admin/home"><i class="fa fa-home"></i> <span>Home</span></a>
        </li>
      <?php if(Render::access(['Admin'])): ?>
        <li class="<?php echo $menu == "user" ? "active" : '' ?>">
          <a href="<?php echo base_url() ?>admin/user"><i class="fa fa-user"></i> <span>Manajemen User</span></a>
        </li>  
      <?php endif; ?>

      <?php if(Render::access(['Admin'])): ?>
        <li class="<?php echo $menu == "klien" ? "active" : '' ?>">
          <a href="<?php echo base_url() ?>admin/klien"><i class="fa fa-bank"></i> <span>Klien</span></a>
        </li>
      <?php endif; ?>

      <?php if(Render::access(['ss'])): ?>
        <li class="<?php echo $menu == "klien" ? "active" : '' ?>">
          <a href="<?php echo base_url() ?>admin/absensi"><i class="fa fa-bank"></i> <span>Absensi</span></a>
        </li>
        <li class="<?php echo $menu == "personil" ? "active" : '' ?>">
          <a href="<?php echo base_url() ?>admin/personil"><i class="fa fa-users"></i> <span>Personil</span></a>
        </li> 
      <?php endif; ?>

        <!-- MENU PERMOHONAN -->
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>