<div class="container">
	<div class="content">
		<h3>Riwayat Transaksi</h3>
		<div class="box-tools pull-right">Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-xs" data-toggle="on"><a href="index.php?page=<?php echo base64_encode('transaksi_on') ?>">On</a></button>
                    <button type="button" class="btn btn-default btn-xs active" data-toggle="On"><a href="index.php?page=<?php echo base64_encode('riwayat') ?>">Off</a></button>
                </div>
            </div>
        </div><br><br>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover dt-responsive nowrap" id="datatables1">
				<thead>
					<tr>
						<th>No</th>
	                    <th>No Transaksi</th>
						<th>Nama Siswa</th>
						<th>Waktu</th>
						<th>Transaksi</th>
						<th>Pengurus</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php

					{
						$sql = mysqli_query($koneksi, "SELECT 
															transaksi.id_trans,
															transaksi.nis, 
															tb_user.nama AS nama_siswa, 
															transaksi.tanggal, 
															transaksi.kredit, 
															transaksi.debit, 
															transaksi.saldo, 
															transaksi.id_admin, 
															transaksi.keterangan 
															FROM transaksi, tb_user 
															WHERE 
															transaksi.nis = tb_user.nis 
															ORDER BY id_trans DESC");
						$data = mysqli_num_rows($sql);
					}
						if ($data == 0) { ?>
							<tr>
								<td colspan="7" style="text-align: center; font-size: 17pt; cursor: default;">Data Kosong</td>
							</tr>
                            </tbody>
                            <tfoot>
                            <tr>
								<th>No</th>
                                <th>No Transaksi</th>
                                <th>NIS</th>
                                <th>Waktu</th>
                                <th>Transaksi</th>
                                <th>Pengurus</th>
                                <th>Keterangan</th>
                            </tr>
                            </tfoot>
					<?php } else {
						$no = 1;
						while($row = mysqli_fetch_assoc($sql)){ ?>
							<tr>
					<td><?php echo $no; ?></td>

					<td><?php echo $row['id_trans']; ?></td>

					<td><a href="index.php?page=<?php echo base64_encode('profile') ?>&amp;nis=<?php echo $row['nis'] ?>"><?php echo $row['nama_siswa']; ?></a></td>

					<td><?php echo date('H:i:s d-m-Y',strtotime($row['tanggal'])); ?></td>

					<?php if ($row['kredit']==0) { ?>
						<td><?php echo "Rp ".number_format($row['debit'],'0',',','.'); ?></td>
					<?php } else { ?>
				    	<td><?php echo "Rp ".number_format($row['kredit'],'0',',','.'); } ?></td>
					<td>
					<?php if ($row['id_admin'] == '0') {
						echo "Siswa";
					} else {
						echo "Admin";
					} ?></td>
					<td><?php echo $row['keterangan']; ?></td>
							</tr>
					<?php $no++; } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
	                    <th>No Transaksi</th>
						<th>NIS</th>
						<th>Waktu</th>
						<th>Transaksi</th>
						<th>Pengurus</th>
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
			<?php } ?>
