<?php 

// id aktifitas
$aktifis=mysqli_query($koneksi,"select max(id_aktifis) as maxaktifis from tb_aktifitas");
$dataaktifis=mysqli_fetch_array($aktifis);
$kodemaximal=$dataaktifis['maxaktifis'];
$idaktifis=(int)substr($kodemaximal,-4);
$kd1=date('y');
$kd2=date('m');
$kd3=date('d');
$idaktifis++;
$nilaikodemax=$kd1.$kd2.$kd3.sprintf("%04s",$idaktifis);

// id transaksi
$trans=mysqli_query($koneksi,"select max(id_trans) as maxtrans from transaksi");
$data=mysqli_fetch_array($trans);
$kodemax=$data['maxtrans'];
$idtrans=(int)substr($kodemax,-4);
$pt1=date('y');
$pt2=date('m');
$pt3=date('d');
$idtrans++;
$vall=$pt1.$pt2.$pt3.sprintf("%04s",$idtrans);
$data=$vall;
$data++;
$val2=$data; 

?>