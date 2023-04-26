<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/datepicker3.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">
	
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="<?= base_url('Dashboard') ?>">SIMPENAS</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="<?= base_url('Dashboard') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-gear">&nbsp;</em> Master Data <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="<?= base_url('Jabatan_dprd') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Jabatan DPRD
					</a></li>
					<li><a class="" href="<?= base_url('Jabatan_pegawai') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Jabatan Pegawai
					</a></li>
					<li><a class="" href="<?= base_url('Partai') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Partai
					</a></li>
					<li><a class="" href="<?= base_url('Komisi') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Komisi
					</a></li>
					<li><a class="" href="<?= base_url('Badan') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Badan
					</a></li>
					<li><a class="" href="<?= base_url('Golongan_pegawai') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Golongan Pegawai
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-users">&nbsp;</em> Anggota <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="<?= base_url('Data_anggota') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Anggota DPRD
					</a></li>
					<li><a class="" href="<?= base_url('Data_pegawai') ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> Pegawai
					</a></li>
				</ul>
			</li>
			<li><a href="<?= base_url('Setup_sppd') ?>"><em class="fa fa-envelope">&nbsp;</em> Setup SPPD</a></li>
			<li><a href="<?= base_url('Sppd') ?>"><em class="fa fa-envelope">&nbsp;</em> SPPD</a></li>
			<li><a href="<?= base_url('Administrator') ?>"><em class="fa fa-user">&nbsp;</em> Administrator</a></li>
			<li><a onclick="return confirm('Apakah anda yakin ingin keluar ?')" href="<?php echo base_url('Auth/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
			</ol>
		</div><!--/.row-->