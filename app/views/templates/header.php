<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<title> Halaman <?= $data['judul'];?> </title>
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
	  <a class="navbar-brand" href="<?= BASEURL; ?>">Aplikasi Gaji</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
		    <a class="nav-item nav-link active" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
	      	<a class="nav-item nav-link" href="<?= BASEURL; ?>/about">About</a>
	      	<a class="nav-item nav-link" href="<?= BASEURL; ?>/profil">Profil</a>
	      	<a class="nav-item nav-link" href="<?= BASEURL; ?>/user">User</a>
	      	<a class="nav-item nav-link" href="<?= BASEURL; ?>/jabatan">Jabatan</a>
	      	<a class="nav-item nav-link" href="<?= BASEURL; ?>/golongan">Golongan</a>
	      	<a class="nav-item nav-link" href="<?= BASEURL; ?>/karyawan">Karyawan</a>
	      	<a class="nav-item nav-link" href="<?= BASEURL; ?>/gaji">Gaji</a>

			<li class="nav-item dropdown">
	    		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Laporan</a>
	    		<div class="dropdown-menu">
	      			<a class="dropdown-item" href="<?= BASEURL; ?>/cetak_jabatan.php" target="_blank">Data Jabatan</a>
	      			<a class="dropdown-item" href="<?= BASEURL; ?>/cetak_golongan.php" target="_blank">Data Golongan</a>
	      			<a class="dropdown-item" href="<?= BASEURL; ?>/cetak_karyawan.php" target="_blank">Data Karyawan</a>
	      			<a class="dropdown-item" href="<?= BASEURL; ?>/cetak_gaji.php" target="_blank">Data Gaji</a>
	    		</div>
	  		</li>

	    </div>
	  </div>
  	</div>
</nav>
