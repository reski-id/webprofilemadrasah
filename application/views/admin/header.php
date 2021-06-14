<?php
$cek    = $v_admin->row();
$nama   = $cek->username;

$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack adminsite Copier/3.x [XR&CO'2014], Tue, 25 Apr 2017 11:59:08 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<base href="<?php echo base_url();?>"/>

	<title><?php echo ucwords($judul); ?></title>

	<!-- Global stylesheets -->
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<?php
	if ($sub_menu == "" or $sub_menu == "profile" or $sub_menu == "lap_pemesanan") {?>
	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!--
	<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
	-->
	<!-- /theme JS files -->
	<?php
	} ?>

	<?php
	if ($sub_menu == "kat_berita" or $sub_menu == "kat_berita_edit" or
			$sub_menu == "berita" or $sub_menu == "berita_edit" or
			$sub_menu == "kat_galeri" or $sub_menu == "kat_galeri_edit" or
			$sub_menu == "galeri" or $sub_menu == "galeri_edit" or
		  $sub_menu == "slide" or $sub_menu == "slide_edit" or $sub_menu == "kontak") {?>
		<!-- Theme JS files -->
		<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/editors/summernote/summernote.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

		<script type="text/javascript" src="assets/js/core/app.js"></script>
		<script type="text/javascript" src="assets/js/pages/editor_summernote.js"></script>
		<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
		<!-- /theme JS files -->
	<?php
	} ?>

</head>
<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default navbar-fixed-top header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="" target="_blank"><i class="icon-eye"></i> Web View</a></li>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="img/default.png" alt="">
						<span><?php echo ucwords($nama); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="admin/profile"><i class="icon-user"></i> Profile</a></li>
						<li class="divider"></li>
						<li><a href="admin/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="admin/profile" class="media-left"><img src="img/default.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo ucwords($nama); ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp; Admin
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if ($sub_menu == "") { echo 'active';}?>"><a href="admin"><i class="icon-home4"></i> <span>Beranda</span></a></li>

								<li class="<?php if ($sub_menu == "berita" or $sub_menu == "berita_edit" or $sub_menu == "kat_berita" or $sub_menu == "kat_berita_edit") { echo 'active';}?>">
									<a href="#"><i class="icon-newspaper"></i> <span>Berita</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "kat_berita" or $sub_menu == "kat_berita_edit") { echo 'active';}?>"><a href="admin/kat_berita">+ Kategori Berita</a></li>
										<li class="<?php if ($sub_menu == "berita" or $sub_menu == "berita_edit") { echo 'active';}?>"><a href="admin/berita">+ Berita</a></li>
									</ul>
								</li>

								<li class="<?php if ($sub_menu == "galeri" or $sub_menu == "galeri_edit" or $sub_menu == "kat_galeri" or $sub_menu == "kat_galeri_edit") { echo 'active';}?>">
									<a href="#"><i class="icon-image2"></i> <span>Galeri</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "kat_galeri" or $sub_menu == "kat_galeri_edit") { echo 'active';}?>"><a href="admin/kat_galeri">+ Album</a></li>
										<li class="<?php if ($sub_menu == "galeri" or $sub_menu == "galeri_edit") { echo 'active';}?>"><a href="admin/galeri">+ Galeri</a></li>
									</ul>
								</li>

								<!-- <li class="<?php if ($sub_menu == "galeri" or $sub_menu == "galeri_edit") { echo 'active';}?>"><a href="admin/galeri"><i class="icon-image2"></i> Galeri</a></li> -->
								<li class="<?php if ($sub_menu == "slide" or $sub_menu == "slide_edit") { echo 'active';}?>"><a href="admin/slide"><i class="icon-image-compare"></i> Slide</a></li>
								<li class="<?php if ($sub_menu == "kontak") { echo 'active';}?>"><a href="admin/kontak"><i class="icon-mailbox"></i> Kontak</a></li>

								<!-- /main -->

								<!-- Logout -->
								<li class="navigation-header"><span>Logout</span> <i class="icon-menu" title=""></i></li>
								<li><a href="admin/logout"><i class="icon-switch2"></i> <span>Logout </span></a></li>

								<!-- /logout -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
