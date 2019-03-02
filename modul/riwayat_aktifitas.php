<div class="container">
	<div class="content">
		<h3>Riwayat Aktivitas</h3>
		<div class="box-tools pull-right">Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-xs" data-toggle="on"><a href="index.php?page=<?php echo base64_encode('aktifitas_on') ?>">On</a></button>
                    <button type="button" class="btn btn-default btn-xs active" data-toggle="On"><a href="index.php?page=<?php echo base64_encode('aktifitas') ?>">Off</a></button>
                </div>
            </div>
        </div><br><br>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover dt-responsive nowrap" id="datatables2">
				<thead>
					<tr>
						<th>No</th>
						<th>No Aktifis</th>
						<th>Petugas</th>
						<th>NIS</th>
						<th>Keterangan</th>
						<th>Waktu</th>
					</tr>
				</thead>
				<tbody>
					<?php

					{
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_aktifitas ORDER BY id_aktifis DESC");
						$data = mysqli_num_rows($sql);
					}
						if ($data == 0) { ?>
							<tr>
								<td colspan="7" style="text-align: center; font-size: 17pt; cursor: default;">Data Kosong</td>
							</tr>
                            <tfoot>
                                <tr>
                                    <th>No</th>
									<th>No Aktifis</th>
                                    <th>Petugas</th>
                                    <th>NIS</th>
                                    <th>Keterangan</th>
                                    <th>Waktu</th>
                                </tr>
                            </tfoot>
                <?php   } else {
						$no = 1;
						while($row = mysqli_fetch_array($sql)){	?>
                    <tr>
                        <td><?php echo $no; ?></td>
						<td><?php echo $row['id_aktifis'] ?></td>
                        <td><?php if($row['id_admin'] == 0){
                            echo "<span> </span>";
                        } else {
                                echo $row['id_admin'];
                        } ?></td>
                        <td><?php if($row['nis'] == 0){
                                echo "<span> </span>";
                            } else {
                                echo "<a href='index.php?page=". base64_encode('profile') ."&amp;nis=".$row['nis']."&amp;ak=true'>".$row['nis']."</a>";
                            } ?>
                        </td>

                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo date('H:i:s d-m-Y',strtotime($row['tanggal'])); ?></td>
					</tr>
						<?php $no++; } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>No Aktifis</th>
						<th>Petugas</th>
						<th>NIS</th>
						<th>Keterangan</th>
						<th>Waktu</th>
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



