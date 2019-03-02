 <script type="text/javascript" src="js/sweetalert-dev.js"></script>
 <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
 <link rel="stylesheet" type="text/css" href="css/google.css">

 <div class="container">
 	<div class="content">
 		<h2>Transfer</h2>
 		<hr />

 		<?php

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		//Load Composer's autoloader
		require 'vendor/autoload.php';

 		$tanggal		= date('d/m/Y');
		$waktu			= date('H:i:s');
 		$nis 		= $_GET['base'];
 		$rek_tujuan = $_GET['to'];
 		$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nis='$nis'");
 		if(mysqli_num_rows($sql) == 0){
 			header("Location: index");
 		}else{
 			$row = mysqli_fetch_assoc($sql);
 		}

		// rek tujuan 
 		$tonis = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nis='$rek_tujuan'");
 		$nisto = mysqli_fetch_assoc($tonis);

		// Email
 		$emailbase 	= $row['email'];
 		$emailto	= $nisto['email'];
 		$namato		= $nisto['nama'];
 		$namabase	= $row['nama'];

 		if(isset($_POST['save'])){
 			$nis_base        = $_POST['nis'];
 			$saldo_base      = $_POST['saldo'];
 			$rek_tujuan      = $_POST['rek_tujuan'];
 			$saldo_tujuan    = $nisto['saldo'];
 			$nk 		     = $_POST['nilai'];
 			$nilai_transfer	 = str_replace(".", "", $nk);
 			$keterangan      = $_POST['keterangan'];
 			$pin		     = $_POST['pin'];
 			$hasil_base      = $saldo_base - $nilai_transfer ;
 			$hasil_tujuan    = $saldo_tujuan + $nilai_transfer;
 			$format_uang 	 = 'Rp. '.number_format($nilai_transfer,'0',',','.');

 			session_start();
 			$id_admin=$_SESSION['id'];
 			$save=mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin='$id_admin' AND pin='$pin'");
 			$ketemu=mysqli_num_rows($save);
 			$r=mysqli_fetch_array($save);
 			$namadm=$r['nama'];
 			if ($ketemu > 0){

 				if ($nilai_transfer > $saldo_base) {
 					echo '<div class="alert alert-danger alert-dismissable">Pastikan Saldo Cukup !.</div>';
 				} else {
				    // ambil nama rek tujuan & base
 					$nama_rekto 	= $nisto['nama'];
 					$nama_rekbase 	= $row['nama'];

 					$update = mysqli_query($koneksi, "UPDATE tb_user SET saldo='$hasil_base' WHERE nis='$nis_base'") or die(mysqli_error());

 					$insert=mysqli_query($koneksi,"INSERT INTO transaksi (id_trans,id_admin, nis,debit,saldo,tanggal,keterangan) VALUES ('$vall','$id_admin','$nis_base','$nilai_transfer','$hasil_base',now(),'Transfer Ke $rek_tujuan($nama_rekto) $keterangan')") or die(mysqli_error());

 					$update2 = mysqli_query($koneksi, "UPDATE tb_user SET saldo='$hasil_tujuan' WHERE nis='$rek_tujuan'") or die(mysqli_error());         

 					$insert=mysqli_query($koneksi,"INSERT INTO transaksi (id_trans,id_admin, nis,kredit,saldo,tanggal,keterangan) VALUES ('$val2','$id_admin','$rek_tujuan','$nilai_transfer','$hasil_tujuan',now(),'Transfer Dari $nis_base($nama_rekbase) $keterangan')") or die(mysqli_error());

 					if($insert){
 						echo "<script type=text/javascript>
 						swal({
 							title:'',
 							text: 'Transfer $format_uang Berhasil',
 							type:'success',
 							timer: 2000,
 							showConfirmButton: false },
 							function() {window.location.href='index';
 						});                   
 						</script>";

 						$aktivitas = mysqli_query($koneksi, "INSERT INTO tb_aktifitas(id_aktifis, id_admin, keterangan) VALUES ($nilaikodemax,'$namadm($id_admin)','$nis_base($nama_rekbase) transfer saldo ke $rek_tujuan($nama_rekto) sejumlah $format_uang')") or die(mysqli_error());   


 						$mail = new PHPMailer(true);                              
					    //Server settings
					    // $mail->SMTPDebug = 2;                                
					    $mail->isSMTP();                                     
					    $mail->Host = 'smtp.gmail.com';  
					    $mail->SMTPAuth = true;          
					    $mail->Username = 'fikal1410@gmail.com';                 
					    $mail->Password = 'hmpbvcxgbqumpvux';                           
					    $mail->SMTPOptions = array(
					        'ssl' => array(
					            'verify_peer'   => false,
					            'verify_peer_name'  => false,
					            'allow_self_signed' => true
					        )
					    );        
					    $mail->SMTPSecure = 'tls';
					    $mail->Port = 587;  


					    try {
					            //Recipients
					        $mail->setFrom('asbank@adisanggoro.sch.id', 'ASBank');
					        $mail->addAddress('$emailbase');  // pengirim

					            //Content
					            $mail->isHTML(true);                                  // Set email format to HTML
					            $mail->Subject = 'Transaksi';
					            $mail->Body    = "Transfer berhasil kepada $rek_tujuan($namato) sebesar $format_uang <br>
					            pada tanggal $tanggal pukul $waktu";
					            $mail->AltBody = 'Tubuh email';

					            if ($mail->send()){

					                $mail->clearAddresses();

					                $mail->setFrom('cs.asbank@asbank.com', 'ASBank');
					                $mail->addAddress('$emailto'); // penerima

					            $mail->isHTML(true);                                  // Set email format to HTML
					            $mail->Subject = 'Transaksi';
					            $mail->Body    = "Transfer berhasil dari $nis_base($namabase) sebesar $format_uang <br>
					            pada tanggal $tanggal pukul $waktu";
					            $mail->AltBody = 'Tubuh email';

					            $mail->send();

					            // echo "<script>console.log('Email terkirim')</script>";

					        } else {
					            echo "<script>console.log('Email tidak terkirim')</script>";
					        }
					    } catch (Exception $e) {
					        echo "<script>
					        console.log('Pesan tidak bisa dikirim');
					        console.log('Pesan error : ".$mail->ErrorInfo.";
					        </script>";
					    } 
						

					}else{
						// echo '<div class="alert alert-danger alert-dismissable">Data gagal disimpan, silahkan coba lagi.</div>';
						echo "<script>
						alert('Data gagal disimpan')
						</script>";

					}
				}

			} else {
				echo '<div class="alert alert-danger alert-dismissable">Pastikan Password yang anda masukan benar</div>';
			}
		}
		?>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">NIS (Asal)</label>
				<div class="col-sm-2">
					<input type="text" name="nis" readonly="true" value="<?php echo $row['nis']; ?>" class="form-control" placeholder="NIS" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-4">
					<input type="text" name="nama" readonly="true" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Saldo Saat Ini</label>
				<div class="col-sm-4">
					<input type="text" name="tampil" readonly="true" value="<?php 
					$jum  ="0";
					$pem  =",";
					$rib  =".";
					echo "Rp ".number_format($row['saldo'],$jum,$pem,$rib); ?>" class="form-control" placeholder="saldo" required>

					<input type="text" name="saldo" hidden="true" value="<?php echo $row ['saldo']; ?>"  placeholder="saldo" >
				</div>
			</div>

			<hr>

			<div class="form-group">
				<label class="col-sm-3 control-label">NIS (Tujuan)</label>
				<div class="col-sm-2">
					<input type="text" name="rek_tujuan" readonly="true" value="<?php echo $nisto['nis']; ?>" class="form-control" placeholder="NIS / Rek" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-4">
					<input type="text" name="nama" readonly="true" value="<?php echo $nisto['nama']; ?>" class="form-control" placeholder="Nama" required>
				</div>
			</div>

			<hr>


			<div class="form-group">
				<label class="col-sm-3 control-label">* Transfer</label>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">Rp. </span>
						<input type="text" name="nilai" autofocus="true" autofocus="true" onkeypress="return isNumberKey(event)" id="formater" class="form-control" placeholder="Nominal Hanya Angka" required autocomplete="off">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Keterangan (Optional)</label>
				<div class="col-sm-4">
					<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" autocomplete="off" onkeypress="tes()">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">* PIN</label>
				<div class="col-sm-4">
					<input type="password" name="pin" class="form-control" placeholder="PIN" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp;</label>
				<div class="col-sm-6">
					<input type="submit" style="width: 40%; margin-left: 20px;" name="save" class="btn btn-sm btn-success" value="Proses">
					<a href="index?page=<?php echo base64_encode('cek_rek') ?>&amp;nis=<?php echo $nis ?>" style="width: 40%; margin-left: 20px;" class="btn btn-sm btn-danger">Batal</a>
				</div>
			</div>
		</form>
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


