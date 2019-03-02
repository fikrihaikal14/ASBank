<?php

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis       = $_POST['nis'];
@$password  = $_POST['pin'];
$error      = '';

$execute = mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis'");
    
    if (mysqli_num_rows($execute) > 0){
        $jfah = mysqli_fetch_array($execute);
        $pass = $jfah['sandi'];

        if (password_verify($password,$pass)) {
            $error = 'FALSE';

            $execute = mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis'");

            while ($ambil = mysqli_fetch_array($execute)){
                $saldo = 'Rp. '.number_format($ambil['saldo'],'0',',','.');
                $nama  = $ambil['nama'];
                $data2 = array(
                    'nis' => $ambil['nis'],
                    'nama' => $ambil['nama'],
                    'saldo' => $saldo,
                    'email' => $ambil['email'],
                    'pin' => $ambil['pin']
                );
            }

            $array = array(
                'status' => '200',
                'error'  => $error,
                'data'   => $data2
            );

            header('Content-Type: Application/Json');
            echo json_encode($array);

            $query = "INSERT INTO tb_aktifitas (id_aktifis, nis, keterangan) VALUES ('$nilaikodemax','$nis','User $nis($nama) Login')";
            $aktifis = mysqli_query($conn, $query)or die(mysqli_error());
        } else {
            $error = 'Password anda tidak cocok';
            $array = array(
                'status' => '404',
                'error'  => $error,
            );

            header('Content-Type: Application/Json');
            echo json_encode($array);
        }
    } else {
        $error = 'Nis tidak aktif';
        $array = array(
            'status' => '404',
            'error'  => $error,
        );

        header('Content-Type: Application/Json');
        echo json_encode($array);
    }
