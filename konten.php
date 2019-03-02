<?php
	$page = (isset($_GET['page'])) ? (base64_decode($_GET['page'])) : "main";
		switch ($page) {

			// lalu lintas user
			case 'tambah-user': include "modul/user/add.php"; break;
			case 'profile': include "modul/user/profile.php"; break;
			case 'detail-profile': include "modul/user/detail_profile.php"; break;
			case 'hapus': include "modul/user/hapus.php"; break;
			case 'users': include "modul/user/cari_user.php"; break;

			// lalu lintas tabung
			case 'tabung': include "modul/tabung.php"; break;
			case 'kredit': include "modul/kredit.php"; break;

			// lalu lintas ambil
			case 'ambil': include "modul/ambil.php"; break;	
			case 'debit': include "modul/debit.php"; break;

			// lalu lintas transfer
			case 'form_tf': include "modul/transfer/form_tf.php"; break;
			case 'cek_rek': include "modul/transfer/cek_rek.php"; break;
			case 'transfer': include "modul/transfer/transfer.php"; break;	

			// riwayat transaksi
			case 'riwayat': include "modul/riwayat.php"; break;
			case 'transaksi_on': include "modul/transaksi_on.php"; break;
			
			case 'aktifitas': include "modul/riwayat_aktifitas.php"; break;
			case 'aktifitas_on': include "modul/aktifitas_on.php"; break;
			
			case 'task': include "modul/task_view.php"; break;
			case 'task_on': include "modul/task_on.php"; break;

			// lalu lintas feedback
			case 'feedback': include "modul/feedback.php"; break;
			
			case 'logout': include "logout.php"; break;

			default : include 'modul/transaksi_on.php';	

		}
?>