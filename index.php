<?php 
/*
  | Source Code Aplikasi Penjualan Barang Kasir dengan PHP & MYSQL
  | 
  | @package   : pos-kasir-php
  | @file	   : index.php 
  | 
  | 
  | 
 */

	@ob_start();
	session_start();

	if(!empty($_SESSION['admin'])){
	// if(!empty($hasil['user'])){
		require 'config.php';
		include $view;
		$lihat = new view($config);
		$toko = $lihat -> toko();
		//  admin
			include 'admin/template/header.php';
			include 'admin/template/sidebar.php';
				if(!empty($_GET['page'])){
					include 'admin/module/'.$_GET['page'].'/index.php';
				}else{
					include 'admin/template/home.php';
				}
			include 'admin/template/footer.php';
		// end admin
	}
	elseif(!empty($_SESSION['kasir'])){
		// if(!empty($_SESSION[$user])){
			require 'config.php';
			include $view;
			$lihat = new view($config);
			$toko = $lihat -> toko();
			//  kasir
				include 'admin/template/header.php';
				include 'admin/template/sidebar.php';
					if(!empty($_GET['page'])){
						include 'admin/module/'.$_GET['page'].'/index.php';
					}else{
						include 'admin/template/home.php';
					}
				include 'admin/template/footer.php';
			// end kasir
		}
	
	else{
		echo '<script>window.location="login.php";</script>';
	}
?>

