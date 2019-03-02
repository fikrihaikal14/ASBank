<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="css/google.css">

	<div class="container">
		<div class="content">
			<h2>Debit</h2>
			<hr />
			
			<?php

			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;

			//Load Composer's autoloader
			require 'vendor/autoload.php';

			if(isset($_GET['n'])){
				$nominal = number_format($_GET['n'],'0',',','.');
			}

			$tanggal		= date('d/m/Y');
			$waktu			= date('H:i:s');

			$nis = $_GET['nis'];
			$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nis='$nis'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){

				$nis2		     = $_POST['nis'];
				$nama		     = $_POST['nama'];
				$saldo           = $_POST['saldo'];
				$d 		         = $_POST['debit'];
				$debit			 = str_replace(".", "", $d);
				$pin		     = $_POST['pin'];
				$hasil           = $saldo - $debit ;
				$format_uang 	 = 'Rp. '.number_format($debit,'0',',','.');
				
				session_start();
		         $id_admin=$_SESSION['id'];
	             $save=mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin='$id_admin' AND pin='$pin'");
	             $ketemu=mysqli_num_rows($save);
	             $r=mysqli_fetch_array($save);
	             $namaadm=$r['nama'];
	            if ($ketemu > 0){
					
	            	if ($debit > $saldo) {
	            		echo '<div class="alert alert-danger alert-dismissable">Pastikan Saldo Cukup !.</div>';
	            	} else {

	            		$update = mysqli_query($koneksi, "UPDATE tb_user SET saldo='$hasil' WHERE nis='$nis2'") or die(mysqli_error());

		                $insert=mysqli_query($koneksi,"INSERT INTO transaksi (id_trans,id_admin, nis,debit,saldo,tanggal,keterangan) VALUES ('$vall','$id_admin','$nis2','$debit','$hasil',now(),'Tarik Tunai')") or die(mysqli_error());

						
						if($update){
							if (isset($_GET['task'])) {
								$idtask = $_GET['task'];
							}

							$sql = mysqli_query($koneksi, "DELETE FROM tb_task WHERE id_task='$idtask'"); ?>
							
							<script type=text/javascript>
		                       swal({
		                             title:'',
		                             text: 'Penarikan saldo <?php echo $format_uang ?> Berhasil',
		                             type:'success',
		                             timer: 2000,
		                             showConfirmButton: false },
		                             function() {window.location.href='index?nis=<?php echo $nis ?>';}
									 );                   
		                       </script>
				<?php	
			                $aktifis = mysqli_query($koneksi, "INSERT INTO tb_aktifitas
								(id_aktifis, id_admin, keterangan)
									VALUES
								('$nilaikodemax','$namaadm($id_admin)','akun $nis($nama) Tarik tunai sejumlah $format_uang')")
								or die(mysqli_error());

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
						        $mail->setFrom('fikal1410@gmail.com', 'ASBank');
						        $mail->addAddress('matray1410@gmail.com'); 

					            //Content
					            $mail->isHTML(true);                                  // Set email format to HTML
					            $mail->Subject = 'Transaksi';
					            $mail->Body    = "Berhasil tarik tunai sebesar $format_uang <br>
					            pada tanggal $tanggal pukul $waktu";
					            $mail->AltBody = 'Tubuh email';

						        if ($mail->send()){
						            echo "<script>console.log('Email terkirim')</script>";
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
							echo '<div class="alert alert-danger alert-dismissable">Data gagal disimpan, silahkan coba lagi.</div>';
						}
	            	}

				} else {
					echo '<div class="alert alert-danger alert-dismissable">Pastikan PIN yang anda masukan benar</div>';
				}
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIS</label>
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
						<div class="input-group">
							<div class="input-group-addon">Rp. </div>
							<input type="text" name="tampil" readonly="true" value="<?php echo number_format($row['saldo'],'0',',','.'); ?>" class="form-control" placeholder="saldo" required>
				
							<input type="text" name="saldo" hidden="true" value="<?php echo $row ['saldo']; ?>"  placeholder="saldo" >
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Debit *</label>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-addon">Rp. </span>
							<?php
							if(!isset($nominal)){ ?>
								<input type="text" name="debit" autofocus="true" onkeypress="return isNumberKey(event)" id="formater" class="form-control" placeholder="Nominal Hanya Angka" required>
					<?php	} else { ?>
								<input type="text" name="debit" readonly="true" value="<?php echo $nominal; ?>" id="formater" class="form-control" placeholder="Nominal Hanya Angka" required>
					<?php	}
							?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PIN *</label>
					<div class="col-sm-4">
						<input type="password" name="pin" class="form-control" onkeypress="return isNumberKey(event)" placeholder="PIN" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" style="width: 40%; margin-left: 20px;" name="save" class="btn btn-sm btn-success" id="save" value="Proses">
						<?php 
						if(!isset($_GET['n'])){ ?>
							<a href="index?page=<?php echo base64_encode('ambil') ?>" style="width: 40%; margin-left: 20px;" class="btn btn-sm btn-danger">Batal</a>
				<?php	} else { ?>
							<a href="index?page=<?php echo base64_encode('task_on') ?>" style="width: 40%; margin-left: 20px;" class="btn btn-sm btn-danger">Batal</a>
				<?php	}
						
						?>
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

		var interval = setInterval(disable, 1000);

		// function disable() {
		// 	$('#save').on('click', function() {
		// 		$('#save').prop('disabled', true);
		// 	});
		// }
		

	</script>


	