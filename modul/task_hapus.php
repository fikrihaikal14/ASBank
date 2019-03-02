<?php 

include_once "../config/koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM tb_task WHERE id_task='$id'");
if ($hapus) {
    
    $array['pesan'] = "Berhasil dihapus";

    echo json_encode($array);
} else {
    $array['pesan'] = "Gagal dihapus";

    echo json_encode($array);
}