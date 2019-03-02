<?php

$nis  = $_GET['nis'];
$nama = $_GET['nama'];

    $delete = mysqli_query($koneksi, "DELETE FROM tb_user WHERE nis='$nis'");

    $delete2 = mysqli_query($koneksi, "DELETE FROM transaksi WHERE nis='$nis'");

    $aktifis = mysqli_query($koneksi, "INSERT INTO tb_aktifitas
                            (id_aktifis, id_admin, keterangan)
                                VALUES
                            ('$nilaikodemax','$nama_adm($id)','akun $nis($nama) dihapus oleh $id($nama_adm)')")
    or die(mysqli_error());

    $backto_temp = mysqli_query($koneksi, "UPDATE user_tmp SET akses='0' WHERE nis='$nis'");

    if ($delete && $delete2) { ?>
        <script type=text/javascript>
            window.location.href='index?page=<?php echo base64_encode('aktifitas_on')?>';
            console.log('Delete Successfully');
        </script>
    <?php   } else { ?>
        <script type=text/javascript>
            alert('Data Gagal Dihapus');
            window.location.href='index?page=<?php echo base64_encode('detail-profile') ?>';
            console.log('Delete Failed');
        </script>
    <?php }