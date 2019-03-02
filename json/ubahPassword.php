<?php

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis          = $_POST['nis'];
@$passwordBaru = $_POST['passwordBaru'];
@$passwordLama = $_POST['passwordLama'];

$lihatData = mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis'");

if(mysqli_num_rows($lihatData) == '1'){
    $data = mysqli_fetch_array($lihatData);
    $password = $data['sandi'];

    if (password_verify($passwordLama, $password)) {
        
        $hashPass = password_hash($passwordBaru, PASSWORD_BCRYPT);

        $queryUbah = mysqli_query($conn, "UPDATE tb_user SET sandi='$hashPass', akses='1' WHERE nis='$nis'");
        if ($queryUbah) {
            $response = array(
                'status'    => '200',
                'pesan'     => 'Password berhasil diubah'
            );

            header('Content-Type: Application/Json');
            $json = json_encode($response);
            echo $json;

            $aktivitas = mysqli_query($conn, "INSERT INTO tb_aktifitas(id_aktifis, nis, keterangan) VALUES ($nilaikodemax,$nis_base,'$nis mengubah password") or die(mysqli_error());
        } else {
            $response = array(
                'status'    => '404',
                'pesan'     => 'Password gagal diubah'
            );

            header('Content-Type: Application/Json');
            $json = json_encode($response);
            echo $json;
        }
    } else {
        $response = array(
            'status'    => '404',
            'pesan'     => 'Pastikan Password anda benar'
        );

        header('Content-Type: Application/Json');
        $json = json_encode($response);
        echo $json;
    }
} else {
    $response = array(
        'status'    => '404',
        'pesan'     => 'Nis tidak aktif'
    );

    header('Content-Type: Application/Json');
    $json = json_encode($response);
    echo $json;
}