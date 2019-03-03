<?php

require "config/koneksi.php";
require "modul/data/data_id.php";

session_start();
if(isset($_SESSION['id'])) {
	echo "<script>window.location='index'</script>";
} else {
	if (isset($_POST['login'])) {
		$id = ($_POST['id']);
		$password = md5($_POST['password']);
		$login=mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin='$id' AND password='$password'") or die(mysqli_error($koneksi));
		$ketemu=mysqli_num_rows($login);
		$r=mysqli_fetch_array($login);
		$namaadm=$r['nama'];
		if ($ketemu > 0){
			$_SESSION['id'] = $r['id_admin'];
			$_SESSION['nama'] = $r['nama'];
			$nama = $r['nama'];
			print "<script>location.href='index'; </script>";
			$aktifis = mysqli_query($koneksi, "INSERT INTO tb_aktifitas
			      (id_aktifis, id_admin, keterangan)
			        VALUES
			      ('$nilaikodemax','$namaadm($id)','admin $id($nama) Login')")
			      or die(mysqli_error($koneksi));
		}
		else{
			echo "<script> alert ('ID dan Password Salah'); document.location.href='login' ;</script>";
		}
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="#696969">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/logo.png"/>
	<title>Login ASBank</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">

  <script type="text/javascript" src="js/sweetalert-dev.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="css/google.css">
	<style>
		.content {
			margin-top: 80px;
		}
		#brand { color: white }
		#brand:hover { color: darkslategrey }
		.navbar { border: none; }
	</style>
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
			<a class="navbar-brand visible-xs-block visible-sm-block" id="brand" href="">ASBank</a>
			<a class="navbar-brand hidden-xs hidden-sm" href="index.php" id="brand" style="font-weight: bold;">ASBank</a>
			</div>
			</div>
	</nav>

	<div class="container">
		<div class="content">
			<h2 style="font-variant: initial; text-align: center;">Form Login Petugas</h2>
			<hr/>
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<center>
					<form class="form-vertical" action="" method="post">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><b>ID</b></span>
								<input type="text" autofocus="true" name="id" onkeypress="return isNumberKey(this)" class="form-control" placeholder="Masukan ID anda" required autocomplete="off">
							</div><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock" ></i></span>
								<input type="password" autofocus="true" name="password" class="form-control" placeholder="Password" required>
							</div>
						</div>	
						<div class="form-group" >
							<div class="row">
								<input type="submit" name="login" class="btn btn-sm btn-success col-md-4 col-md-offset-4" value="Masuk">
							</div>
						</div>
					</form>	
				</center>
				</div>
			</div>	
		</div>
	</div>
    <script language=Javascript>

        function isNumberKey(evt)
        {
            var charCode=(evt.which) ? evt.which:event.keyCode
            if(charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

    </script>
</body>
</html>