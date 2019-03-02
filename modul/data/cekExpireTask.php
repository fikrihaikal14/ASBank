<?php

include_once '../../config/koneksi.php';

$waktuSekarang = $_GET['expire'];
mysqli_query($koneksi, "DELETE FROM tb_task WHERE expire <= '$waktuSekarang'");