<?php
date_default_timezone_set('Asia/Jakarta');
include "config/koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

session_start();
error_reporting(0);
if(!isset($_SESSION['id'])) {
	echo "<script>window.location='login'</script>";
}
$id = $_SESSION['id']; 
$sql=mysqli_query($koneksi,"select * from tb_admin where id_admin='$id'");
$r=mysqli_fetch_array($sql);
$nama_adm = $_SESSION['nama'];

include_once 'modul/data/data_id.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/logo.png"/>
	<title>ASBank</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="components/DataTable/datatables.min.css"/>
 
	<script src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="components/DataTable/datatables.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/sweetalert.min.js"></script>
	<script src="js/mask-money.js"></script>

	<style> 
		* {font-family: Sans-serif} 
		a:hover { text-decoration: none; }
		.content { margin-top: 10px; } 
		.navbar { background-color: #00a65a; border: none; }
	    .nav { background-color: #00a65c}
		#navbar a { color: white; line-height: 20px;}
		#navbar a:hover { background-color: #008749 }
		#brand { color: lightgrey; transition: .4s; }
		#brand:hover { color: white }
	</style>
    
    <script type="text/javascript">
    	$(function () {
            $('#datatables1').DataTable({
            	'paging'      : true,
			    'lengthChange': true,
			    'searching'   : true,
			    'ordering'    : false,
			    'info'        : true,
			    'autoWidth'   : false
			});
            $('#datatables2').DataTable({
            	'paging'      : true,
			    'lengthChange': true,
			    'searching'   : true,
			    'ordering'    : false,
			    'info'        : true,
			    'autoWidth'   : false
			});
            $('#datatables3').DataTable({
            	'paging'      : true,
			    'lengthChange': true,
			    'searching'   : true,
			    'ordering'    : false,
			    'info'        : true,
			    'autoWidth'   : false
			});
			$('#datatables4').DataTable({
            	'paging'      : false,
			    'lengthChange': true,
			    'searching'   : false,
			    'ordering'    : false,
			    'info'        : false,
			    'autoWidth'   : false
			});
			$('#datatables5').DataTable({
            	'paging'      : false,
			    'lengthChange': true,
			    'searching'   : false,
			    'ordering'    : false,
			    'info'        : false,
			    'autoWidth'   : false
			});
        });

    	$(function() {
			$('#formater').maskMoney({thousands:'.', decimal:',', precision:0});
		});
    </script>
	
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed" style="border-radius:0px; box-shadow: 1px 1px 2px grey;">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="nav">
					<a class="navbar-brand visible-xs-block visible-sm-block" id="brand" style="font-weight: bold; margin-left:10px; text-align: center" href="index">ASBank</a>
					<a class="navbar-brand hidden-xs hidden-sm" id="brand" href="index" style="font-weight: bold;">ASBank</a>
				</div>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index">Beranda</a></li>
					<li><a href="?page=<?php echo base64_encode('aktifitas_on') ?>">Aktivitas</a></li>
					<li><a href="?page=<?php echo base64_encode('task_on') ?>">Daftar Pengajuan</a></li>
					<li><a href="?page=<?php echo base64_encode('tabung') ?>">Kredit</a></li>
					<li><a href="?page=<?php echo base64_encode('ambil') ?>">Debit</a></li>
					<li><a href="?page=<?php echo base64_encode('form_tf') ?>">Transfer</a></li>
					<li><a href="?page=<?php echo base64_encode('users') ?>">Pengguna</a></li>
					<li><a href="?page=<?php echo base64_encode('tambah-user') ?>">Tambah Pengguna</a></li>
					<li><a href="?page=<?php echo base64_encode('logout') ?>">keluar (<?php echo $r['nama']; ?>)</a></li>
					<li><a href="?page=<?php echo base64_encode('feedback') ?>">Timbal Balik</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="body">
		<?php

		include"konten.php"; 

		?>
	</div>
	<script type="text/javascript">

		function hapusExpiredTask() {
		    var waktu = new Date();
		    var expire = waktu.getHours()+':'+waktu.getMinutes()+':'+waktu.getSeconds(); 
		    
		    $.ajax({
		        url : 'modul/data/cekExpireTask.php',
		        data : 'expire='+expire
		    });	    
		}

		var het = setInterval(hapusExpiredTask, 1000);

	</script>
</body>
</html>