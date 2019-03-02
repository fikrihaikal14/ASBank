<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis_base		= $_POST['base'];
@$nis_tujuan 	= $_POST['to'];
@$nilai_transfer= $_POST['nominal'];
@$keterangan  	= $_POST['keterangan'];
@$password 		= $_POST['password'];
$format_uang	= 'Rp. '.number_format($nilai_transfer,'0',',','.');
$tanggal		= date('d/m/Y');
$waktu			= date('H:i:s');

$datatujuan		= mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis_tujuan'");
if (mysqli_num_rows($datatujuan) == '1') {
	$arraynistujuan = mysqli_fetch_array($datatujuan);
	$saldo_tujuan	= $arraynistujuan['saldo'];
	$nama_tujuan	= $arraynistujuan['nama'];
	$email_tujuan	= $arraynistujuan['email'];

	// data user
	$sql = "SELECT * FROM tb_user WHERE nis='$nis_base' AND akses='1'";
	$cari = mysqli_query($conn, $sql);
	$arraynisbase = mysqli_fetch_array($cari);

	// ambil nilai max saldo
	$ambilnilaimaxsaldo = mysqli_query($conn, "SELECT max(saldo) AS maxsaldo FROM tb_user WHERE nis='$nis_base'");
	$arraynilaimaxsaldo = mysqli_fetch_array($ambilnilaimaxsaldo);

	$passbase 	  = $arraynisbase['sandi'];
	$nama_base 	  = $arraynisbase['nama'];
	$email_base   = $arraynisbase['email'];
	$saldo_base	  = $arraynilaimaxsaldo['maxsaldo'];

	if($arraynisbase['akses'] == '1'){
		if (password_verify($password, $passbase)) {
			$hasil_base      = $saldo_base - $nilai_transfer ;
			$hasil_tujuan    = $saldo_tujuan + $nilai_transfer;
			if ($saldo_base >= $nilai_transfer) {
				try {
					$update = mysqli_query($conn, "UPDATE tb_user SET saldo='$hasil_base' WHERE nis='$nis_base'") or die(mysqli_error());
	
					$insert=mysqli_query($conn,"INSERT INTO transaksi (id_trans,nis,debit,saldo,tanggal,keterangan) VALUES ('$vall','$nis_base','$nilai_transfer','$hasil_base',now(),'Transfer Ke $nis_tujuan($nama_tujuan) $keterangan')") or die(mysqli_error());
	
					$update2 = mysqli_query($conn, "UPDATE tb_user SET saldo='$hasil_tujuan' WHERE nis='$nis_tujuan'") or die(mysqli_error());         
	
					$insert=mysqli_query($conn,"INSERT INTO transaksi (id_trans,nis,kredit,saldo,tanggal,keterangan) VALUES ('$val2','$nis_tujuan','$nilai_transfer','$hasil_tujuan',now(),'Transfer Dari $nis_base($nama_base) $keterangan')") or die(mysqli_error());
	
					if ($insert) {
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
					        $mail->addAddress('$email_tujuan'); 

							//Content
							$mail->isHTML(true);                                  // Set email format to HTML
							$mail->Subject = 'Transaksi';
							$mail->Body    = "Transfer berhasil kepada $nis_tujuan($nama_tujuan) sebesar $format_uang <br>
							pada tanggal $tanggal pukul $waktu";
							$mail->AltBody = 'Tubuh email';

							if ($mail->send()){
								$mail->clearAddresses();

								$mail->setFrom('cs.asbank@asbank.com', 'ASBank');
								$mail->addAddress('$email_base'); 

								$mail->isHTML(true);                                  // Set email format to HTML
								$mail->Subject = 'Transaksi';
								$mail->Body    = "Transfer berhasil dari $nis_base($nama_base) sebesar $format_uang <br>
								pada tanggal $tanggal pukul $waktu";
								$mail->AltBody = 'Tubuh email';

								if ($mail->send()) {
									echo "<script>console.log('Email terkirim')</script>";
								} else {
									echo "<script>console.log('Email tidak terkirim')</script>";
								}
					        } else {
					            echo "<script>console.log('Email tidak terkirim')</script>";
					        }
					    } catch (Exception $e) {
					        echo "<script>
					        console.log('Pesan tidak bisa dikirim');
					        console.log('Pesan error : ".$mail->ErrorInfo.";
					        </script>";
					    }
	
						$response = array(
							'status'	=> 200,
							'pesan'		=> 'Transfer berhasil ke '.$nis_tujuan
						);
	
						header('Content-Type: Application/Json');
						$json = json_encode($response);
						echo $json;
						
						$aktivitas = mysqli_query($conn, "INSERT INTO tb_aktifitas(id_aktifis, nis, keterangan) VALUES ($nilaikodemax,$nis_base,'$nis_base($nama_base) transfer saldo ke $nis_tujuan($nama_tujuan) sejumlah $format_uang')") or die(mysqli_error());

					} else {
						$response = array(
							'status'	=> 404,
							'pesan'		=> 'Transfer Gagal ke '.$nis_tujuan
						);
	
						header('Content-Type: Application/Json');
						$json = json_encode($response);
	
						echo $json;
					}
	
				} catch (Exception $e) {
					$response = array(
						'status'	=> 404,
						'pesan'		=> 'Proses transfer gagal : $e'
					);
	
					header('Content-Type: Application/Json');
					$json = json_encode($response);
	
					echo $json;
				}
			} else {
				$response = array(
					'status'	=> 404,
					'pesan'		=> 'Pastikan saldo anda mencukupi'
				);
	
				header('Content-Type: Application/Json');
				$json = json_encode($response);
	
				echo $json;	
			}
		} else {
			$response = array(
				'status'	=> 404,
				'pesan'		=> 'Pastikan Password anda benar'
			);
	
			header('Content-Type: Application/Json');
			$json = json_encode($response);
	
			echo $json;
		}
	} else {
		$response = array(
			'status'	=> 404,
			'pesan'		=> 'Nis belum aktif'
		);

		header('Content-Type: Application/Json');
		$json = json_encode($response);

		echo $json;
	}
} else {
	$response = array(
		'status'	=> 404,
		'pesan'		=> 'Pastikan Nis yang anda masukan sudah terdaftar'
	);

	header('Content-Type: Application/Json');
	$json = json_encode($response);

	echo $json;
}