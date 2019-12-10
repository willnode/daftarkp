
<html>
<head>
	<title>Sistem Informasi Kerja Praktik</title>
	<link rel="stylesheet" href="<?=base_url('vendors/font-awesome/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('vendors/coreui/css/style.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('vendors/coreui/icons/css/coreui-icons.min.css')?>">
	<script src="<?=base_url('vendors/jquery/jquery.min.js')?>"></script>
	<script src="<?=base_url('vendors/bootstrap/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('vendors/coreui/js/coreui.min.js')?>"></script>
	<script src="<?=base_url('assets/style.css')?>"></script>

	<link rel="icon" href="<?=base_url('assets/logo.png')?>">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">


<header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="<?=base_url('assets/logo.png')?>" width="25" height="25" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav d-md-down-none ml-auto">
        <li class="nav-item px-3">
          <a class="nav-link" href="<?=base_url('')?>">Dashboard</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="<?=base_url('logout')?>">Logout</a>
        </li>
      </ul>
    </header>

    <div class="app-body">
      <?php $this->load->view($this->session->userdata('role')."/sidebar") ?>
      <main class="main">
