	<div class="container">
		<div class="content">
			<h2>Detail Akun</h2>
			<hr />
			<?php
			$nis = $_GET['nis'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nis='$nis'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index");
			}else{
				$row = mysqli_fetch_assoc($sql);
				$nama = $row['nama'];
			}
			
			?>
			
			<table class="table table-striped table-condensed">
				<tr>
					<th width="30%">NIS</th>
					<td>:  <?php echo $row['nis']; ?></td>
					<td></td>
				<tr>
					<th>Nama Pengguna</th>
					<td>:  <?php echo $row['nama']; ?></td>
					<td></td>
				</tr>
				<tr>
					<th>Email</th>
					<td>: <?php echo $row['email']; ?></td>
					<td></td>
				</tr>
				<tr>
					<th>Saldo</th>
					<td>:  <?php 
				     $jum  ="2";
				     $pem  =",";
				     $rib  =".";
				     echo "Rp ".number_format($row['saldo'],$jum,$pem,$rib);?></td>
					<td></td>
				</tr>
				<tr>
					<th>Bergabung Tgl</th>
					<td>: <?php echo date('H:i:s d-m-Y',strtotime($row['tgl_join'])); ?></td>
					<td></td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<td></td>
				</tr>
			</table>

	<?php 
				if (isset($_GET['t']) == 'true') { ?>
					<a href="index?page=<?php echo base64_encode('profile') ?>&amp;nis=<?php echo $nis ?>&amp;t=true" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
	<?php	} else if (isset($_GET['cn']) == 'true') { ?>
				<a href="index?page=<?php echo base64_encode('profile') ?>&amp;nis=<?php echo $nis ?>&amp;cn=true" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
	<?php	} else if (isset($_GET['fb']) == 'true') { ?>
				<a href="index?page=<?php echo base64_encode('profile') ?>&amp;nis=<?php echo $nis ?>&amp;fb=true" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
	<?php	} else if (isset($_GET['add']) == 'true') { ?>
				<a href="index?page=<?php echo base64_encode('profile') ?>&amp;nis=<?php echo $nis ?>&amp;add=true" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
	<?php	} else { ?>
				<a href="index?page=<?php echo base64_encode('profile') ?>&amp;nis=<?php echo $nis ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
	<?php	} ?>
			
			<a href="" data-target="#modal-hapus" data-toggle="modal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>

			<a href="" data-target="#modal-password" data-toggle="modal" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Edit Password</a>

			<a href="" data-target="#modal-email" data-toggle="modal" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-mail" aria-hidden="true"></span> Edit Email</a>

			<?php 
			if($row['token'] != ''){ ?>
					<a href="" data-target="#modal-gettoken" data-toggle="modal" class="btn btn-sm btn-primary"><span class="" aria-hidden="true"></span> Dapatkan token</a>		
<?php	}	?>

			<!-- Modal Hapus -->
		    <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" area-labelledby="editlabel">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		              
		              <h3 class="modal-title" id="">Hapus</h3>
		              
		            </div>

		            <div class="modal-body">
		             <h4>Anda Yakin ingin mengapus <?php echo $row['nama'].' ('.$row['nis'].')'; ?></h4>
		            </div>

		            <div class="modal-footer">
                        <form action="" method="post">
                            <input type="password" name="pin" style="outline: none; text-indent: 5px" placeholder="PIN" required autofocus="true"><br><br>
                            <input type="submit" name="hapus" value="Hapus" class="btn btn-danger btn-sm">
                            <a href="" class="btn btn-success btn-sm" data-dismiss="modal" style="margin-right: 10px"><span class="glyphicon glyphicon-refresh"></span> Batal </a>
                            <?php

                            if (isset($_POST['hapus'])){
                                session_start();
                                $id_admin=$_SESSION['id'];
                                $pin = $_POST['pin'];

                                $cocokandenganadmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin='$id_admin' AND pin='$pin'");

                                if (mysqli_num_rows($cocokandenganadmin) > 0){?>
                                    <script>
                                      window.location.href='index?page=<?php echo base64_encode('hapus') ?>&nis=<?php echo $row['nis'] ?>&nama=<?php echo $row['nama'] ?>';
                                    </script>
                          <?php } else { ?>
                                    <script>
                                        alert('Pin anda salah')
                                    </script>
                          <?php } 
                      		 } ?>
                        </form>
		            </div>
		        </div>
		      </div>
		    </div>

		    <!-- Modal Edit password -->
		    <div class="modal fade" id="modal-password" tabindex="-1" role="dialog" area-labelledby="editlabel">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		              
		              <h3 class="modal-title" id="">Edit Password</h3>
		              
		            </div>

		          <form action="" method="post">
		            <div class="modal-body">
		             	<input type="password" name="passwordbaru" class="form-control" placeholder="Password baru" required autofocus><br>
		             	<input type="password" name="passwordbaru2" class="form-control" placeholder="Tulis Ulang Password baru" required><br>
		             	<input type="password" name="pin" class="form-control" placeholder="PIN" required><br>
		            </div>

		            <div class="modal-footer">
		            	<button name="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"> Simpan</i></button>
		            	<a href="" class="btn btn-success btn-sm" data-dismiss="modal" style="margin-right: 10px"><span class="glyphicon glyphicon-refresh"></span> Batal </a>
		            </div>
		          </form>
		          <?php 

		          if (isset($_POST['simpan'])) {
		          	$pass1 = $_POST['passwordbaru'];
		          	$pass2 = $_POST['passwordbaru2'];
		          	$pin   = $_POST['pin'];
		          	$nis2   = $row['nis'];

		          	if ($pass1 == $pass2) {
		          		session_start();
		          		$id = $_SESSION['id'];

		          		$cocokanpinnadmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin='$id' AND pin='$pin'"); 
		          		if (mysqli_num_rows($cocokanpinnadmin) > 0) { 
		          			
		          			$hashPass = password_hash($pass1, PASSWORD_BCRYPT);

		          			$update = mysqli_query($koneksi, "UPDATE tb_user SET sandi='$hashPass', akses='1' WHERE nis='$nis2'") or die(mysqli_error());

		          			if ($update) { ?>
											<script>
												alert('Password berhasil di ubah');
												window.location.href='index?page=<?php echo base64_encode('detail-profile'); ?>&nis=<?php echo $nis ?>'
											</script>
								<?php		$aktifis = mysqli_query($koneksi, "INSERT INTO tb_aktifitas
																						(id_aktifis, id_admin, keterangan)
																								VALUES
																						('$nilaikodemax','$nama_adm($id)','akun $nis2($nama) merubah password')")
											or die(mysqli_error());	
		          			} else {
		          				echo "<script>alert('Password gagal diubah')</script>";
		          			}
		          		} else { ?>
							<script>
								alert('Pin anda salah')
							</script>
							<?php } 
								} else { ?>

									<script>
										alert('Password tidak sama')
									</script>
						<?php } 
							
							} ?>
		        </div>
		      </div>
		    </div>
			<!-- End -->

			<!-- Modal Edit Email -->
		    <div class="modal fade" id="modal-email" tabindex="-1" role="dialog" area-labelledby="editlabel">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		              
		              <h3 class="modal-title" id="">Edit Email</h3>
		              
		            </div>

		          <form action="" method="post">
		            <div class="modal-body">
		             	<input type="email" name="emailbaru" class="form-control" placeholder="Email baru" required autofocus><br>
		             	<input type="password" name="pin" class="form-control" placeholder="PIN" required><br>
		            </div>

		            <div class="modal-footer">
		            	<button name="simpanEmail" class="btn btn-primary"><i class="glyphicon glyphicon-save"> Simpan</i></button>
		            	<a href="" class="btn btn-success btn-sm" data-dismiss="modal" style="margin-right: 10px"><span class="glyphicon glyphicon-refresh"></span> Batal </a>
		            </div>
		          </form>
		          <?php 

		          if (isset($_POST['simpanEmail'])) {
		          	$email = $_POST['emailbaru'];
		          	$pin2   = $_POST['pin'];
								$nis2   = $row['nis'];
					  
		          	 session_start();
		          	$id = $_SESSION['id'];

		          		if ($email != null) {
											$cocokanpinnadmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin='$id' AND pin='$pin2'") or die(mysqli_errno()); 
											if (mysqli_num_rows($cocokanpinnadmin) > 0) { 
												
												$updateEmail = mysqli_query($koneksi, "UPDATE tb_user SET email='$email' WHERE nis='$nis2'") or die(mysqli_error());
												$updateEmail2 = mysqli_query($koneksi, "UPDATE user_tmp SET email='$email' WHERE nis='$nis2'") or die(mysqli_error());

												if ($updateEmail && $updateEmail2) { ?>
															<script>
															  alert('Email berhasil diubah');
																window.location.href='index?page=<?php echo base64_encode('detail-profile'); ?>&nis=<?php echo $nis ?>'
															</script>
										<?php		$aktifis = mysqli_query($koneksi, "INSERT INTO tb_aktifitas
																								(id_aktifis, id_admin, keterangan)
																										VALUES
																								('$nilaikodemax','$nama_adm($id)','akun $nis2($nama) merubah email')")
													or die(mysqli_error());
												} else {
													echo "<script>alert('Email gagal diubah')</script>";
												}
											} else { ?>
											<script>
												alert('Pin anda salah')
											</script>
						<?php 	}
									} else { ?>
											<script>
												alert('Isi kolom email dengan benar')
											</script>
						<?php	} 
				  } ?>

		        </div>
		      </div>
		    </div>
			<!-- End -->

			<!-- Modal Get Token -->
			<div class="modal fade" id="modal-gettoken" tabindex="-1" role="dialog" area-labelledby="editlabel">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		              
		              <h3 class="modal-title" id="">Token User</h3>
		              
		            </div>

		          <form action="" method="post">
		            <div class="modal-body">
		             	<span>Silahkan masukan PIN anda</span>
									 <input type="password" name="pin" class="form-control" placeholder="PIN" required><br>

		            </div>

		            <div class="modal-footer">
		            	<button name="lihat" class="btn btn-primary"> Lihat</button>
		            	<a href="" class="btn btn-success btn-sm" data-dismiss="modal" style="margin-right: 10px"><span class="glyphicon glyphicon-refresh"></span> Batal </a>
		            </div>
		          </form>
		          <?php 

		          if (isset($_POST['lihat'])) {
		          	$pin   = $_POST['pin'];
								$nis2   = $row['nis'];
					  
		          	 session_start();
		          	$id = $_SESSION['id'];

		          		$cocokanpinnadmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin='$id' AND pin='$pin'"); 
		          		if (mysqli_num_rows($cocokanpinnadmin) > 0) { 
										
											$query = mysqli_query($koneksi, "SELECT token FROM tb_user WHERE nis='$nis2'") or die(mysqli_errno());
											if($query){
												$data = mysqli_fetch_array($query);
												$token = $data['token'];

													echo "<script>sweetAlert('Token :  $token ')</script>";
											}
											
		          		} else { ?>
							<script>
								alert('Pin anda salah')
							</script>
				<?php 	} 
				  } ?>

		        </div>
		      </div>
		    </div>
			<!-- End -->

			
		</div>
	</div>