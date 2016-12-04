<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">

    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
		  <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span>Menu</span>
		  </button>
		  <!-- Site name for smallar screens -->
		  <a href="<?php echo base_url() ?>Admin" class="navbar-brand hidden-lg">AP Banyuwangi</a>
		</div>



      <!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

        <ul class="nav navbar-nav">
        </ul>
        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-user"></i> <?php $biodata = $this->session->userdata('userDetail'); echo $biodata['nama']; ?> <b class="caret"></b>
            </a>

            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <!-- <li><a href="#"><i class="fa fa-user"></i> Profile</a></li> -->
              <!-- <li><a href="#"><i class="fa fa-cogs"></i> Settings</a></li> -->
              <li><a href="<?php echo base_url(); ?>Homepage/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>

        </ul>
      </nav>

    </div>
  </div>


<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">

        <!-- Logo section -->
        <div class="col-md-4">
          <!-- Logo. -->
          <div class="logo">
            <h1><a href="#">AP<span class="bold">Banyuwangi</span></a></h1>
            <p class="meta">Halaman Administrator</p>
          </div>
          <!-- Logo ends -->
        </div>
      </div>
    </div>
  </header>

<!-- Header ends -->

<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <!-- Main menu with font awesome icon -->
          <li class="open"><a href="<?php echo base_url() ?>Admin/"><i class="fa fa-home"></i> Dashboard</a>
          <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Web</a>
            <!-- Sub menu markup
            <ul>
              <li><a href="#">Submenu #1</a></li>
              <li><a href="#">Submenu #2</a></li>
              <li><a href="#">Submenu #3</a></li>
            </ul>-->
          </li>
          <li class="has_sub">
			         <a href="#"><i class="fa fa-list-alt"></i>Permohonan  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="<?php echo base_url() ?>Admin/DataPengajuan/daftar">Permohonan Baru</a></li>
              <li><a href="<?php echo base_url() ?>Admin/DataPengajuan/proses">Permohonan Proses</a></li>
              <li><a href="<?php echo base_url() ?>Admin/DataPengajuan/selesai">Permohonan Selesai</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url() ?>admin/ListUser"><i class="fa fa-home"></i> Pengguna</a>
          <li><a href="<?php echo base_url() ?>admin/ListAdmin"><i class="fa fa-home"></i> Administrator</a>

        </ul>
    </div>

    <!-- Sidebar ends -->
