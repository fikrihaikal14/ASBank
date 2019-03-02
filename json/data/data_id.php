<?php

include_once 'koneksi.php';

// id aktifitas
$aktifis=mysqli_query($conn,"select max(id_aktifis) as maxaktifis from tb_aktifitas");
$dataaktifis=mysqli_fetch_array($aktifis);
$kodemaximal=$dataaktifis['maxaktifis'];
$idaktifis=(int)substr($kodemaximal,-4);
$kd1=date('y');
$kd2=date('m');
$kd3=date('d');
$idaktifis++;
$nilaikodemax=$kd1.$kd2.$kd3.sprintf("%04s",$idaktifis);

// id task
$task=mysqli_query($conn,"select max(id_task) as maxtask from tb_task");
$datatask=mysqli_fetch_array($task);
$kode=$datatask['maxtask'];
$idtask=(int)substr($kode,-4);
$ts1=date('y');
$ts2=date('m');
$ts3=date('d');
$idtask++;
$kodetaskmax=$ts1.$ts2.$ts3.sprintf("%04s",$idtask);

// id transaksi
$trans=mysqli_query($conn,"select max(id_trans) as maxtrans from transaksi");
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

// id feedback
$feedback=mysqli_query($conn,"select max(id_fb) as maxfb from tb_feedback");
$datafeedback=mysqli_fetch_array($feedback);
$fbmaximal=$datafeedback['maxfb'];
$idfb=(int)substr($fbmaximal,-4);
$fb1=date('y');
$fb2=date('m');
$fb3=date('d');
$idfb++;
$fbkodemax=$fb1.$fb2.$fb3.sprintf("%04s",$idfb);