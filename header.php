<?php 
include 'db/pdo.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>SIMENS BPKAD KAB.BANJAR</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
          <script src="//code.jquery.com/jquery-1.10.2.js"></script>
          <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
          <link rel="stylesheet" href="/resources/demos/style.css">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        <link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>

<header class="navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $base_url;?>"><img title="BPKAD Kabupaten Banjar" width="50" src="<?php echo $base_url."/logo.JPG"; ?>"/></a>
    </div>
    <div class="site-title">SISTEM INFORMASI DOKUMEN KEPEGAWAIAN PNS BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KABUPATEN BANJAR - SUB BAGIAN UMUM DAN KEPEGAWAIAN</div>
    <div class="collapse navbar-collapse">
      <?php 
      if(isset($_SESSION['username'])){
      ?>
      <ul class="nav navbar-nav">
        <li><a href="<?php echo $base_url;?>">Home</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Pegawai</a>
            <ul class="dropdown-menu">
		        <li><a href="<?php echo $base_url;?>/input_pegawai.php">Input Pegawai</a></li>
                <li><a href="<?php echo $base_url;?>/input_keluarga_pegawai.php">Input Keluarga Pegawai</a></li>                
	        </ul>
        </li>        
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Diklat Pegawai</a>
            <ul class="dropdown-menu">
		        <li><a href="<?php echo $base_url;?>/input_diklat_pegawai.php">Input Diklat</a></li>               
	        </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Kepangkatan Pegawai</a>
            <ul class="dropdown-menu">
		        <li><a href="<?php echo $base_url;?>/input_kepangkatan_pegawai.php">Input Kepangkatan Pegawai</a></li>
	        </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Jabatan Pegawai</a>
            <ul class="dropdown-menu">
		        <li><a href="<?php echo $base_url;?>/input_jabatan_pegawai.php">Input Jabatan Pegawai</a></li>
	        </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendidikan Pegawai</a>
            <ul class="dropdown-menu">
		        <li><a href="<?php echo $base_url;?>/input_pendidikan_pegawai.php">Input Pendidikan Pegawai</a></li>
	        </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Keluarga Pegawai</a>
            <ul class="dropdown-menu">
		        <li><a href="<?php echo $base_url;?>/input_keluarga_pegawai.php">Input Keluarga Pegawai</a></li>
	        </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dokumen</a>
            <ul class="dropdown-menu">
		        <li><a href="<?php echo $base_url;?>/input_dokumen_pendukung_pegawai.php">Input Dokumen Pendukung</a></li>
	        </ul>
        </li>
        <li><a href="<?php echo $base_url;?>/logout.php">Logout</a></li>
      </ul>
      <?php
      } else {
      ?>
      <ul class="nav navbar-nav">
        <li><a href="<?php echo $base_url;?>">Home</a></li>
        <li><a href="#">Diklat Pegawai</a></li>
        <li><a href="#">Kepangkatan Pegawai</a></li>
        <li><a href="#">Jabatan Pegawai</a></li>
        <li><a href="#">Pendidikan Pegawai</a></li>
        <li><a href="#">Dokumen</a></li>
      </ul>
      <?php
      }
      ?>
      <!--ul class="nav navbar-nav navbar-right">
        <li><a href="#about">About</a></li>
      </ul-->
    </div><!--/.nav-collapse -->
  </div>
</header>

<!-- Begin Body -->
<div class="container">
    <div class="row">




