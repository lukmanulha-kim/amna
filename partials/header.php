<?php session_start(); if (!$_GET['page']) {
  $Page = "HOME";}else{$Page = strtoupper($_GET['page']);} ?>
<!DOCTYPE html>
<html>
<head>
<title><?=@$Page;?> - AMNA</title>
<link rel="icon" type="image/x-icon" href="images/amna-blue.ico" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
<link href="assets/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
  body{
    background-image: url("images/bg.png");
  }
</style>
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body class="d-flex flex-column">
<!-- <div id="preloader">
  <div id="status">&nbsp;</div>
</div> -->
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<header id="header">
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="index.html"><img src="images/logoo.png" alt=""></a></div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav custom_nav">
          <li class="<?php if($_GET['page']==""){echo"active";} ?>"><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
          <?php if (@$_SESSION['id_user']=="") {?>
          	<li class="<?php if($_GET['page']=="login"){echo"active";} ?>"><a href="?page=login"><i class="fa fa-sign-in"></i> Login</a></li>
          <?php }else{ ?>
          <li class="<?php if($_GET['page']=="undangan"){echo"active";} ?>"><a href="?page=undangan"><i class="fa fa-envelope"></i> Undangan</a></li>
          <li class="<?php if($_GET['page']=="bukutamu"){echo"active";} ?>"><a href="?page=bukutamu"><i class="fa fa-book"></i> Buku Tamu</a></li>
          <li class="<?php if($_GET['page']=="rekap"){echo"active";} ?>"><a href="?page=rekap"><i class="fa fa-list-alt"></i> Rekap</a></li>
          <?php if ($_SESSION['level']=="1"): ?>
          <li class="<?php if($_GET['page']=="user"){echo"active";} ?>"><a href="?page=user"><i class="fa fa-users"></i> User</a></li>
          <?php endif ?>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $_SESSION['nama'] ?></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
              <li><a href="#"><i class="fa fa-cog"></i> Pengaturan</a></li>
              <li><a href="?page=logout" onclick="return confirm('Apakah Anda Yakin Ingin Keluar Dari Aplikasi ?')"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
          <li></li>
	      <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>