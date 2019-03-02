<div class="container">
    <div class="content">
        <style type="text/css">
            button>a {
                color: white;
                text-decoration: none;
            }
            button>a:hover {
                color: white;
                text-decoration: none;
            }
        </style>
        <h3>Daftar Pengajuan</h3>
        <div class="box-tools pull-right">Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
                    <button type="button" class="btn btn-default btn-xs" data-toggle="On"><a href="index.php?page=<?php echo base64_encode('task') ?>" style="color:#337ab7">Off</a></button>
                </div>
            </div>
        </div><br><br>


        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="datatables5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
                        <th>Waktu</th>
                        <th>Proses</th>
                    </tr>
                </thead>
                <tbody id="load">

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
                        <th>Waktu</th>
                        <th>Proses</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    update();
    hapusExpiredTask();
});
 
 var intervalNya = setInterval(update, 5000);
 var intervalNya2 = setInterval(hapusExpiredTask, 2000);

 function update() {
    $.getJSON("modul/real_time/task_realtime.php", function(data) {
        $("tbody").empty();
        $.each(data.result, function() {
            var dataHandler = $("#load");
            var newRow      = $("<tr>");

                var id_task = this['id_task'];
                var proses = this['keterangan'];
                
                if (proses == 'kredit') {
                    var ket = "<button class='btn btn-success' onclick='clearInterval(intervalNya)' name='kredit'><a href='index.php?page=<?php echo base64_encode('kredit') ?>&amp;nis="+this['nis']+"&amp;task="+this['id_task']+"&amp;n="+this['nominal2']+"' class='tombol'>Acc</a></button>";
                } else if (proses == 'debit'){
                    var ket = "<button class='btn btn-primary' onclick='clearInterval(intervalNya)' name='debet'><a href='index.php?page=<?php echo base64_encode('debit') ?>&amp;nis="+this['nis']+"&amp;task="+this['id_task']+"&amp;n="+this['nominal2']+"' class='tombol'>Acc</a></button>"
                }
                var hapus = "<button class='btn btn-danger' style='float:right' onclick='hapusTask("+this['id_task']+")' name='debet'><span class='glyphicon glyphicon-trash'></span></button>";

                newRow.html("<td>"+this['id_task']+"</td><td><a href='index.php?page=<?php echo base64_encode('profile') ?>&amp;nis="+this['nis']+"&amp;t=true'>"+this['nama']+"</td><td>"+this['keterangan']+"</td><td>"+this['nominal']+"</td><td>"+this['tanggal']+"</td><td>"+ket+"&nbsp;"+hapus+"</td>");                                                      

            dataHandler.append(newRow);
         });
    });
}

function hapusTask(id) {
    var idtrans = id;
    
    $.ajax({
        url : 'modul/task_hapus.php',
        data : 'id='+idtrans
    });
}

function hapusExpiredTask() {
    var waktu = new Date();
    var expire = waktu.getHours()+':'+waktu.getMinutes()+':'+waktu.getSeconds(); 
    
    $.ajax({
        url : 'modul/data/cekExpireTask.php',
        data : 'expire='+expire
    });
    
}

</script>