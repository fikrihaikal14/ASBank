  <script type="text/javascript" src="js/sweetalert-dev.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="css/google.css">
	<div class="container">
		<div class="content">
			<h2>Kredit</h2>
			<hr />	
			 <?php
             include "config/koneksi.php";
             if(isset($_POST['nis'])){
             $nis=$_POST['nis'];
             $cari=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE nis='$nis'");
             $ketemu=mysqli_num_rows($cari);
             $r=mysqli_fetch_array($cari);
            if ($ketemu > 0){ ?>
                 <script> location.href='index?page=<?php echo base64_encode('kredit') ?>&nis=<?php echo $nis ?>'; </script>

    <?php   }
            else{
                 echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nis Tidak Ditemukan</div>';
             }}      
              ?>

            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-sm-5 col-xs-3">NIS</label>
                            <div class="col-sm-6 col-md-6 col-xs-6">
                                <input type="text" name="nis" id="cariNis" class="form-control" placeholder="NIS" autofocus="true" onkeypress="return isNumberKey(event)" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="submit" name="save" class="btn btn-sm btn-success col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3" value="Lanjutkan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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



	

