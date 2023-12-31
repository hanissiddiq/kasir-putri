<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword">

    <title>Login To Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="./assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="./assets/css/style.css" rel="stylesheet">
    <!-- <link href="./assets/css/style-responsive.css" rel="stylesheet"> -->


	<script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/sweetalert/sweetalert2.all.min.js"></script>

    <script type='text/javascript'>
    function myAlert(){
	Swal.fire({ 
		title: 'LOGIN BERHASIL!',
		text: '',
		icon: 'success' 
		},
		 function(){
			window.location.href = 'index.php';
		});
		}

	function alertGue(){
	Swal.fire({ 
		title: 'BERHASIL!',
		text: 'LOGIN',
		icon: 'success' 
		},
		 setTimeout(function(){
			window.location.href= 'index.php';
		},3000));
		}
	</script>

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">


	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"> -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


<?php 
/*echo "<script type='text/javascript'>

function callSweet(){
	swal({ 
		title: 'BERHASIL!',
		text: 'LOGIN',
		icon: 'success' 
		},
		 setTimeout(function(){
			window.location.href = 'index.php';
		},3000));
		}
	</script>";
*/

"<script type='text/javascript'>

function mySweet(){
	swal({ 
		title: 'BERHASIL!',
		text: 'LOGIN',
		icon: 'success' 
		},
		 function(){
			window.location.href = 'index.php';
		});
		}
	</script>";


	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';
			
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

		$sql = 'select member.*, login.user, login.pass
				from member inner join login on member.id_member = login.id_member
				where user =? and pass = md5(?)';
		$row = $config->prepare($sql);
		$row -> execute(array($user,$pass));
		$jum = $row -> rowCount();
		if($jum > 0){
			$_SESSION['level']= $level;
			$_SESSION['role_id']= $role;
			$hasil = $row -> fetch();
			// $_SESSION['admin'] = $hasil;
			$_SESSION[$user] = $hasil;
			// print_r($hasil['user']);
			// die;
			
			// echo '<script> alertGue();</script>';
			
			
			// echo '<script>alertGue();window.location="index.php"</script>';
			echo '<script>alert("Login Sukses");window.location="index.php"</script>';
			

			// Code By Hanis
			// if ($cekData->is_active == 1) {
			// 	$session = array(
			// 		'id_login'   => $cekData->id_login,
			// 		'role_id'   => $cekData->role_id,
			// 		'user'  => $cekData->user,
			// 		'pass'  => $cekData->pass,
			// 		'nama'      => $cekData->nama,
			// 		'profile'   => $cekData->profile,
			// 		'is_login'  => 'login'
			// 	);
			// 	$this->session->set_userdata($session);
			// }
			
			// end Code By Hanis



		}
		elseif($jum > 0){
			$_SESSION['level']= $level;
			$_SESSION['role_id']= $role;
			$hasil = $row -> fetch();
			// $_SESSION['kasir'] = $hasil;
			$_SESSION[$user] = $hasil;
			var_dump($hasil);
			echo '<script>alert("Login Sukses");window.location="index.php"</script>';
		}
		else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
		}
	}
?>

<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword">

    <title>Login To Admin</title>

     Bootstrap core CSS -->
    <!-- <link href="./assets/css/bootstrap.css" rel="stylesheet"> -->
    <!--external css-->
    <!-- <link href="./assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
        
    <!-- Custom styles for this template -->
    <!-- <link href="./assets/css/style.css" rel="stylesheet"> -->
    <!-- <link href="./assets/css/style-responsive.css" rel="stylesheet"> -->

	<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet"> -->

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"> -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- </head> --> 

  <body style="background:#004643;color:#fff;">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page" style="padding-top:3pc;">
	  	<div class="container">
		      <form class="form-login" method="POST">
		        <h2 class="form-login-heading">Aplikasi POS</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="user" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" class="form-control" name="pass" placeholder="Password">
		            <br>
		            <button class="btn btn-primary btn-block" name="proses" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <!-- <button class="btn btn-primary btn-block" onclick="alertGue();"  name="proses" type="submit"><i class="fa fa-lock"></i> SIGN IN</button> -->
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

	<!-- sweetalertsweetalert@2.1.2 script -->
<!-- <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script> -->
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">


  </body>
</html>

