
<div class="container">
	<div class="content">
		<h2>Info Akun</h2>
		<hr />
		<?php
		$nis = $_GET['nis'];
		
		$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nis='$nis'");
		if(mysqli_num_rows($sql) == 0){
			header("Location: index");
		}else{
			$row = mysqli_fetch_assoc($sql);
		}
		
		?>
		
		<div class="table-responsive">
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
					<th>Saldo</th>
					<td>:  <?php 
				     $jum  ="2";
				     $pem  =",";
				     $rib  =".";
				     echo "Rp ".number_format($row['saldo'],$jum,$pem,$rib);?></td>
					<td></td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>

		<?php
		if(isset($_GET['t'])=='true'){ ?>
			<a href="index?page=<?php echo base64_encode('task_on') ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
			<a href="index?page=<?php echo base64_encode('detail-profile') ?>&amp;nis=<?php echo $nis ?>&amp;t=true" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Detail</a>
<?php	} else if(isset($_GET['cn'])=='true'){ ?>
			<a href="index?page=<?php echo base64_encode('users') ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
			<a href="index?page=<?php echo base64_encode('detail-profile') ?>&amp;nis=<?php echo $nis ?>&amp;cn=true" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Detail</a>
<?php	} else if(isset($_GET['fb']) == 'true') { ?>
			<a href="index?page=<?php echo base64_encode('feedback') ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
			<a href="index?page=<?php echo base64_encode('detail-profile') ?>&amp;nis=<?php echo $nis ?>&amp;fb=true" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Detail</a>
<?php	} else if(isset($_GET['ak']) == 'true') { ?>
			<a href="index?page=<?php echo base64_encode('aktifitas_on') ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
			<a href="index?page=<?php echo base64_encode('detail-profile') ?>&amp;nis=<?php echo $nis ?>&amp;add=true" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Detail</a>
<?php	} else { ?>
			<a href="index" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
			<a href="index?page=<?php echo base64_encode('detail-profile') ?>&amp;nis=<?php echo $nis ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Detail</a>
<?php	}
		?>
		
		
		
		<hr>

		<div class="table-responsive">
			<h3>Riwayat</h3>
			<table class="table table-striped table-hover" id="datatables3">
				<thead>
					<tr>
	                    <th>No</th>
						<th>Tanggal</th>
	                    <th>Kredit</th>
	                    <th>Debit</th>
	                    <th>Saldo</th>
	                    <th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$nis = $_GET['nis'];
					{
						$sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE nis='$nis' ORDER BY tanggal DESC" );
					
					}

					if (mysqli_num_rows($sql) == 0) { ?>
							<tr>
								<td colspan="7" style="text-align: center; font-size: 17pt; cursor: default;">Belum ada riwayat</td>
							</tr>		

					<?php } else {						

						$no = 1;
						while($row = mysqli_fetch_assoc($sql)){
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.date('H:s:i d-m-Y',strtotime($row['tanggal'])).'</td>
								<td>'.number_format($row['kredit'],"0",",",".").'</td>
								<td>'.number_format($row['debit'],"0",",",".").'</td>
								<td>'.number_format($row['saldo'],"0",",",".").'</td>
								<td>'.$row['keterangan'].'</td>
								</td>
								
							</tr>
							';
							$no++;
						}
					
					 } ?>
				</tbody>
				<tfoot>
					<tr>
	                    <th>No</th>
						<th>Tanggal</th>
	                    <th>Kredit</th>
	                    <th>Debit</th>
	                    <th>Saldo</th>
	                    <th>Keterangan</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>