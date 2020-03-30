<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Rankv2</title>
  
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>AdminLTE/dist/css/adminlte.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo BASE_URL; ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Graph<small class="text-danger">(EM BREVE)</small></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo BASE_URL;?>" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>RANK</b> 2.0 </a></span>
    </a>
      
    <!-- Sidebar -->
    <div class="sidebar">
<!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="" class="d-block"><?php echo $viewData['user']->getName(); ?> </a>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ADM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
          <?php if($viewData['user']->hasPermission('pview')): ?>
            <li class="nav-item active">
               <a href="<?php echo BASE_URL; ?>permissions" class="nav-link <?php echo($viewData['menuActive']=='permissions')?'active':'';?>">
               <i class="nav-icon fas fa-link"></i>
                <p>
                  Grupo de Permissões           
                </p>
              </a>
            </li>
           <?php endif;  ?>    
        </ul>
        <ul class="nav nav-treeview">
          <?php if($viewData['user']->hasPermission('pview')): ?>
            <li class="nav-item active">
               <a href="<?php echo BASE_URL;?>wallets" class="nav-link <?php echo($viewData['menuActive']=='wallets')?'active':'';?>">
               <i class="nav-icon fas fa-link"></i>
                <p>
                  Carteiras           
                </p>
              </a>
            </li>
           <?php endif;  ?>    
        </ul>
        <ul class="nav nav-treeview">
          <?php if($viewData['user']->hasPermission('pview')): ?>
            <li class="nav-item active">
               <a href="<?php echo BASE_URL;?>products" class="nav-link <?php echo($viewData['menuActive']=='products')?'active':'';?>">
               <i class="nav-icon fas fa-link"></i>
                <p>
                  Produtos           
                </p>
              </a>
            </li>
           <?php endif;  ?>    
        </ul>
        <ul class="nav nav-treeview">
          <?php if($viewData['user']->hasPermission('pview')): ?>
            <li class="nav-item active">
               <a href="<?php echo BASE_URL;?>rankings" class="nav-link <?php echo($viewData['menuActive']=='rankings')?'active':'';?>">
               <i class="nav-icon fas fa-link"></i>
                <p>
                  Rank           
                </p>
              </a>
            </li>
           <?php endif;  ?>    
        </ul>                   
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
    <!--
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
    -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h6 class="text-center bg-primary">SubMenu</h6>
      <hr class="bg-white">
      <p class=""><a href="<?php echo BASE_URL; ?>login/logout">SAIR</a></p>
<hr class="bg-white">
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">REDEBRASIL</a></strong> Todos os direitos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>'</script>
<!-- jQuery -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/ajax-script.js"></script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>AdminLTE/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>

