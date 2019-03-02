  <script type="text/javascript" src="js/sweetalert-dev.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="css/google.css">
<div class="container">
	<div class="content">
		<h2>Tambah Pengguna</h2>
		<hr/>

<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['simpan'])){
	$nis		     = $_POST['nis'];
	$nama		     = $_POST['nama'];
	$kelas		     = $_POST['kelas'];
	$jurusan	     = $_POST['jurusan'];
	$email		     = $_POST['email'];
	$jam			 = date('H') + 23;
	$menit			 = date('i') + 59;
	$detik  = date('s');
	$menit = date('i')+59;
	$jam   = date('H')+23;
	if ($detik > 60) {
		$detik = $detik - 60;
		$menit = $menit + 1;
	} else if ($menit > 60) {
		$menit = $menit - 60;
		$jam   = $jam + 1;
	} else if ($jam > 24) {
		$jam = $jam - 24;
	}
	$expire = $jam.':'.$menit.':'.$detik;

	$periksanis = mysqli_query($koneksi, "SELECT nis FROM user_tmp WHERE nis='$nis'");

	if (mysqli_num_rows($periksanis) > 0){
        $cek = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nis='$nis'");
        if (mysqli_num_rows($cek) == 0) {

        	//token user
        	$randomtext = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
			$randomtext = str_shuffle($randomtext);
			$randomtext = substr($randomtext, 0, 4);
			$nisrandom  = substr($nis, -4);
			$token 		= $randomtext.$nisrandom.date('dm');

			$hashPass = password_hash($token, PASSWORD_BCRYPT);

            $insert = mysqli_query($koneksi, "INSERT INTO tb_user 
                            (nis,sandi,nama,kelas,jurusan,email,akses,token)
                                VALUES
                            ('$nis','$hashPass','$nama','$kelas','$jurusan','$email','0','$token')")
            or die(mysqli_errno());

			$update = mysqli_query($koneksi, "UPDATE user_tmp SET akses='1' WHERE nis=$nis");
			
            $aktifis = mysqli_query($koneksi, "INSERT INTO tb_aktifitas
                            (id_aktifis, id_admin, keterangan)
                                VALUES
                            ('$nilaikodemax','$id','$nis($nama) bergabung melalui Tata Usaha(TU)')")
            or die(mysqli_error());
			
            if($insert) { ?>
            	<script type=text/javascript>
					swal({
							title:'',
							text: 'Data Berhasil Disimpan',
							type:'success',
							timer: 1500,
							showConfirmButton: false },
							function(){window.location.href='index?page=<?php echo base64_encode('profile') ?>&nis=<?php echo $nis ?>&add=true';}
						);
					console.log('Save Successfully');
                </script>";

<?php	 	
				// $buatAktivasi = mysqli_query($koneksi, "INSERT INTO tb_aktivasi VALUES('$token','$expire')");
				/*$token2 = $token;

				$mail = new PHPMailer(true);                              
			    //Server settings
			    // $mail->SMTPDebug = 2;                                
			    $mail->isSMTP();                                     
			    $mail->Host = 'smtp.gmail.com';  
			    $mail->SMTPAuth = true;          
			    $mail->Username = 'fikal1410@gmail.com';                 
			    $mail->Password = 'hmpbvcxgbqumpvux';                           
			    $mail->SMTPOptions = array(
			        'ssl' => array(
			            'verify_peer'   => false,
			            'verify_peer_name'  => false,
			            'allow_self_signed' => true
			        )
			    );      
			    $mail->SMTPSecure = 'tls';
			    $mail->Port = 587;  


			    try {
			            //Recipients
			        $mail->setFrom('fikal1410@gmail.com', 'ASBank');
			        $mail->addAddress('matray1410@gmail.com'); 

			        $bentukhtml = "<style type='text/css'>
								        #textHeader {
								            color: grey;
								            font-size: 15pt;
								        }
								        #btn {
								            width: 100px;
								            height: auto;
								            padding: 10px;
								            background-color: #00a65a;
								            margin: 10px;
								            box-shadow: 0 0 4px grey
								        }
								        #btn:hover { box-shadow: 0 0 2px grey }
								        a {
								            text-decoration: none;
								            color: white;
								        }
								    </style>
			        				<center>
								        <span id='textHeader'>
								            Terimakasih telah mendaftar menjadi anggota ASBank <br>
								            Silahkan klik tombol dibawah ini untuk melakukan aktivasi
								        </span><br><br>
								        <a href='modul/user/EmailConfirm.php?token=<?php echo $token2; ?>' id='btn'>Aktivasi</a><br><br>
								        <span id='textHeader'>
								            Aktivasi ini akan berakhir setelah 24 jam dari waktu pendaftaran
								        </span>
								    </center>";

		            //Content
		            $mail->isHTML(true);                                  // Set email format to HTML
		            $mail->Subject = 'Aktivasi';
		            $mail->Body    = $bentukhtml;
		            $mail->AltBody = 'Tubuh email';

			        if ($mail->send()){
			            echo "<script>console.log('Email terkirim')</script>";
			        } else {
			            echo "<script>console.log('Email tidak terkirim')</script>";
			        }
			    } catch (Exception $e) {
			        echo "<script>
			        console.log('Pesan tidak bisa dikirim');
			        console.log('Pesan error : ".$mail->ErrorInfo.";
			        </script>";
			    }*/

			} else { echo "<div class='alert alert-danger alert-dismissable'>Data gagal disimpan!</div>"; }

        } else { echo "<div class='alert alert-danger alert-dismissable'>Nis sudah terdaftar!</div>"; }

    } else { echo "<div class='alert alert-danger alert-dismissable'>Nis tidak terdaftar!</div>"; }
} 

?>
		
		<form class="form-horizontal" action="" method="POST">
		  <div class="row">
		   <div class="col-md-11">
			<div class="form-group">
				<label class="col-sm-3 control-label">NIS</label>
				<div class="col-sm-7">
					<input type="text" name="nis" id="nis" onkeyup="isiotomatis()" autofocus="true" onkeypress="return isNumberKey(event)" autocomplete="off" class="form-control" placeholder="NIS" maxlength="8" required>
                    <span id="notice" class="" style="color: red; margin-left: 10px;">Form autofill</span>
				</div>
			</div>
			<div class="form-group">
			
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-7">
					<input type="text" name="nama" id="nama" readonly="true" class="form-control" placeholder="Nama Sesuai NIS" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kelas</label>
				<div class="col-sm-7">
					<select name="kelas" readonly="true" id="kelas" class="form-control">
						<option value="" selected disabled>Kelas</option>
                        <option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Jurusan</label>
				<div class="col-sm-7">
					<select name="jurusan" readonly="true" id="jurusan" class="form-control">
                        <option value="" selected disabled>Jurusan</option>
						<option value="geomatika">GEOMATIKA</option>
						<option value="geologi pertambangan">GEOTA</option>
						<option value="rekayasa perangkat lunak">Rekayasa Perangkat Lunak</option>
						<option value="teknik komputer dan jaringan">Teknik Komputer dan Jaringan</option>
						<option value="tata busana">TATA BUSANA</option>
						<option value="mekatronika">MEKATRONIKA</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email</label>
				<div class="col-sm-7">
					<input type="text" name="email" readonly="true" id="email" class="form-control" placeholder="Email aktif" required>
				</div>
		   </div>

			<div class="form-group">
			<label class="col-sm-3 control-label">&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" style="width: 40%; margin-left: 20px;" name="simpan" class="btn btn-sm btn-success" value="Simpan">
				<a href="index" style="width: 40%; margin-left: 20px;" class="btn btn-sm btn-danger">Batal</a>
			</div>
		</div>
		</form>
	</div>
</div>
<script>
	
	function isNumberKey(evt) {
	  var charCode=(evt.which) ? evt.which:event.keyCode
	  if(charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
    return true;
	}

    function isiotomatis() {
        var nis = $('#nis').val();
		
        $.ajax({
            url : 'modul/user/cari_nis.php',
            data : 'nis='+nis,
            success : function (data) {
            	var json = data;
	            var obj = JSON.parse(json);
	                $('#nama').val(obj.nama);
	                $('#kelas').val(obj.kelas);
	                $('#jurusan').val(obj.jurusan);
	                $('#email').val(obj.email);
	        }
        });
    }
</script>
	
