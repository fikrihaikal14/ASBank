<style>
    .list {
        width:100%;
        height: auto;
        padding: 10px;
        margin-top: 10px;
        box-shadow: 1px 2px 2px grey;
        border-top: 1px solid grey;
    }
    #username {
        font-size: 14pt;
    }
    #waktu {
        font-size: 14pt;
        float:right;
    }
    .isi p { 
        font-size:12pt; 
    }
    .isi {
        text-indent:10px;
        margin-top: 10px;
    }
</style>
<div class='container'>
    <div class='content'>
        <h3>Timbal balik</h3>
        <hr>
        
   <?php 
        include "config/koneksi.php";
        $sql = mysqli_query($koneksi, "SELECT tb_user.nama, tb_feedback.nis, tb_feedback.tanggal, tb_feedback.masukan FROM tb_feedback,tb_user WHERE tb_feedback.nis = tb_user.nis ORDER BY id_fb DESC");


        if (mysqli_num_rows($sql) > 0) {
            
            while ($data = mysqli_fetch_array($sql)) { ?>
                
            <div class='list'>
                <span id='username'><a href="index?page=<?php echo base64_encode('profile')?>&amp;nis=<?php echo $data['nis'] ?>&amp;fb=true"><?php echo $data['nama']; ?></a> <?php echo "(".$data['nis'].")" ?></span><span id='waktu'><?php echo date('H:i:s d-m-Y',strtotime($data['tanggal'])); ?></span>
                <div class='isi'>
                    <p> <?php echo $data['masukan']; ?></p>
                </div>
            </div>

        <?php }

        } else { ?>

        <div class='box'>
            <center><h2>Belum ada feedback</h2></center>
        </div>

  <?php } ?>

    </div>
</div>