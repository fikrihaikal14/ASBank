<div class="container">
	<div class="content">
		<style type="text/css">
			a.tombol {
				color: white;
				text-decoration: none;
			}
			a.tombol:hover {
				color: white;
				text-decoration: none;
			}
		</style>
		<h3>Daftar Pengajuan</h3>
		
		<div class="box-tools pull-right">Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-xs" data-toggle="on"><a href="index.php?page=<?php echo base64_encode('task_on') ?>">On</a></button>
                    <button type="button" class="btn btn-default btn-xs active" data-toggle="On"><a href="index.php?page=<?php echo base64_encode('riwayat') ?>">Off</a></button>
                </div>
            </div>
        </div><br><br>
		<div class="table-responsive">
			<table class="table table-striped table-hover dt-responsive nowrap" id="datatables1">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Keterangan</th>
						<th>Nominal</th>
						<th>Waktu</th>
						<th>Proses</th>
					</tr>
				</thead>
				<tbody>
					<?php

					{
						$sql = mysqli_query($koneksi, "SELECT tb_task.id_task,tb_task.nis, tb_user.nama, tb_task.keterangan, tb_task.nominal, tb_task.waktu FROM tb_task,tb_user WHERE tb_task.nis = tb_user.nis ORDER BY id_task ASC limit 100");
						$data = mysqli_num_rows($sql);
					}
						if ($data == 0) { ?>
							<tr>
								<td colspan="7" style="text-align: center; font-size: 17pt; cursor: default;">Tidak ada Task</td>
							</tr>
                            </tbody>
                            <tfoot>
                            <tr>
                            	<th>ID</th>
								<th>Nama</th>
                                <th>Keterangan</th>
								<th>Nominal</th>
                                <th>Waktu</th>
                                <th>Proses</th>
                            </tr>
                            </tfoot>
					<?php } else {
						$no = 1;
						while($row = mysqli_fetch_assoc($sql)){ 
							$nis = $row['nis'];	
							$idtask = $row['id_task']; ?>
					<form action="" method="POST">
					<tr>
						<td><?php echo $row['id_task']; ?></td>
						<td><a href="index.php?page=<?php echo base64_encode('profile') ?>&amp;nis=<?php echo $row['nis'] ?>&amp;t=true "><?php echo $row['nama']; ?></a></td>
						<td><?php echo $row['keterangan']; ?></td>
						<td><?php echo 'Rp. '.number_format($row['nominal'], '0',',','.'); ?></td>
						<td><?php echo date('H:i:s d-m-Y',strtotime($row['waktu'])); ?></td>
						<td>
							<?php 
							if ($row['keterangan'] == 'kredit') { ?>
								<button class='btn btn-success' style="float:left" name="kredit"><a href="index.php?page=<?php echo base64_encode('kredit') ?>&amp;nis=<?php echo $nis; ?>&amp;task=<?php echo $idtask ?>&amp;n=<?php echo $row['nominal'];?>" class="tombol">Acc</a></button>
						<?php } else if ($row['keterangan'] == 'debit') { ?>
								<button class='btn btn-primary' style="float:left" name="debet"><a href="index.php?page=<?php echo base64_encode('debit') ?>&amp;nis=<?php echo $nis; ?>&amp;task=<?php echo $idtask ?>&amp;n=<?php echo $row['nominal'];?>" class="tombol">Acc</a></button>
						<?php }
							?>
							&nbsp;
							<button class='btn btn-danger' style='float:right' name="debet"><a href="index.php?page=<?php echo base64_encode('hapus-task') ?>&amp;nis=<?php echo $nis; ?>&amp;task=<?php echo $idtask ?>" class="tombol"><span class="glyphicon glyphicon-trash"></span></a></button>
							<!-- <div class="dropdown" style="float:right; padding-right:10px;">
							<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dropdown-menu-right" role="menu">
								<li><a href="#">Hapus</a></li>
							</ul>
							</div> -->
						</td>
					</tr>
					</form>
						<?php $no++; } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Keterangan</th>
						<th>Nominal</th>
						<th>Waktu</th>
						<th>Proses</th>
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
			<?php } ?>
