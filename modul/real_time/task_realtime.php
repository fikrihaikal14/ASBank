<?php
include "../../config/koneksi.php";
$sql = mysqli_query($koneksi,"SELECT tb_task.id_task,tb_task.nis, tb_user.nama, tb_task.keterangan, tb_task.nominal, tb_task.waktu FROM tb_task,tb_user WHERE tb_task.nis = tb_user.nis ORDER BY id_task ASC limit 100");
$result = array();
while($row = mysqli_fetch_array($sql)){
	$formatUang = 'Rp. '.number_format($row['nominal'], '0',',','.');

	array_push($result, array('id_task' => $row['id_task'], 'nis' => $row['nis'],'nama' => $row['nama'], 'tanggal' => date('H:i:s  d-m' ,strtotime($row['waktu'])), 'nominal' => $formatUang,'nominal2' => $row['nominal'], 'keterangan' => $row['keterangan']));
}
echo json_encode(array("result" => $result));
?>