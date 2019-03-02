<?php
  include "config/koneksi.php";
  include "modul/data/data_id.php";

  $id = ($_POST['id']);
  $password = md5($_POST['password']);
  $login=mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin='$id' AND password='$password'") or die(mysqli_error());
  $ketemu=mysqli_num_rows($login);
  $r=mysqli_fetch_array($login);
  if ($ketemu > 0){
    session_start();
    $_SESSION['id'] = $r['id_admin'];
    $_SESSION['nama'] = $r['nama'];
    $nama = $r['nama'];
    print "<script>location.href='index'; </script>";
    $aktifis = mysqli_query($koneksi, "INSERT INTO tb_aktifitas
          (id_aktifis, id_admin, keterangan)
            VALUES
          ('$nilaikodemax','$id','admin $id($nama) Login')")
          or die(mysqli_error());
  }
  else{
    echo "<script> alert ('ID dan Password Salah'); document.location.href='login' ;</script>";
  }
   
?>