<script type="text/javascript" src="js/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="css/google.css">

<div class="container">
	<div class="content">
		<h2>Transfer</h2>
		<hr />
		
		<?php
		$nis=$_GET['nis'];
		$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nis='$nis'");
		if(mysqli_num_rows($sql) == 0){
			header("Location: index");
		}else{
			$row = mysqli_fetch_assoc($sql);
		}
		if(isset($_POST['save'])){
			$nis_base		     = $_POST['nis'];
			$rek_tujuan      	 = $_POST['rek_tujuan'];
			
         if ($nis_base == $rek_tujuan) {
         	echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nis Tujuan Tidak Boleh Sama</div>';
         } else {
         	$cari=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE nis='$rek_tujuan'");
            $ketemu=mysqli_num_rows($cari);
            $r=mysqli_fetch_array($cari);
            if ($ketemu > 0){ ?>
             	<script> 
             		window.location.href='index?page=<?php echo base64_encode('transfer') ?>&base=<?php echo $nis ?>&to=<?php echo $rek_tujuan ?>';
             	</script>
      <?php }
            else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nis Tidak Ditemukan</div>';
            }
         }
		}      
          ?>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">NIS</label>
				<div class="col-sm-2">
					<input type="text" name="nis" readonly="true" value="<?php echo $row['nis']; ?>" class="form-control" placeholder="NIS" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-4">
					<input type="text" name="nama" readonly="true" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Saldo Saat Ini</label>
				<div class="col-sm-4">
				<input type="text" name="tampil" readonly="true" value="<?php 
			     $jum  ="0";
			     $pem  =",";
			     $rib  =".";
			     echo "Rp ".number_format($row['saldo'],$jum,$pem,$rib); ?>" class="form-control" placeholder="saldo" required>

			     <hr>
			
				<input type="text" name="saldo" hidden="true" value="<?php echo $row ['saldo']; ?>"  placeholder="saldo" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">NIS Tujuan</label>
				<div class="col-sm-4">
					<input type="text" name="rek_tujuan" autofocus="true" autofocus="true" onkeypress="return isNumberKey(event)" class="form-control" placeholder="No. NIS Tujuan" required autocomplete="off">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp;</label>
				<div class="col-sm-6">
					<input type="submit" style="width: 40%; margin-left: 20px;" name="save" class="btn btn-sm btn-success" value="Lanjutkan">
					<a href="index?page=<?php echo base64_encode('form_tf') ?>" style="width: 40%; margin-left: 20px;" class="btn btn-sm btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>

<script language=Javascript>
	
	function isNumberKey(evt) 
	{
	  var charCode=(evt.which) ? evt.which:event.keyCode
	  if(charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
    return true;
	}
</script>


