<script type="text/javascript" src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="css/google.css">

<?php
$namaadm =	$r['nama'];
$id      = 	$_SESSION['id'];
$aktifis = mysqli_query($koneksi, "INSERT INTO tb_aktifitas
							(id_aktifis, id_admin, keterangan)
								VALUES
							('$nilaikodemax','$namaadm($id)','admin $id($nama_adm) Logout')")
							or die(mysqli_error());

session_start();
session_destroy();
echo "<script type=text/javascript>
	   swal({
	         title:'',
	         text: 'Terimakasih $r[nama]',
	         type:'success',
	         timer: 1500,
	         showConfirmButton: false },
	         function() {
	         	window.location.href='login';
			 });                   
	  </script>"; 
?>