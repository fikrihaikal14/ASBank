<div class="container">
    <div class="content">
        <h3>Riwayat Aktifitas</h3>
        <div class="box-tools pull-right">Real time
            <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
                <button type="button" class="btn btn-default btn-xs" data-toggle="On"><a href="index.php?page=<?php echo base64_encode('aktifitas') ?>">Off</a></button>
            </div>
        </div><br><br>


        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="datatables4">
                <thead>
                <tr>
                    <th>No</th>
                    <th>No Aktifis</th>
                    <th>Petugas</th>
                    <th>NIS</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                </thead>
                <tbody id="load">

                </tbody>
                <tfoot>
                    <th>No</th>
                    <th>No Aktifis</th>
                    <th>Petugas</th>
                    <th>NIS</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    update();
});
 
var intervalNya = setInterval(update, 2000);

 function update() {
    $.getJSON("modul/real_time/aktifitas_realtime.php", function(data) {
        $("tbody").empty();
        $.each(data.result, function() {
            var dataHandler = $("#load");
            var newRow = $("<tr>");
            newRow.html("<td col1>"+this['no']+"</td><td>"+this['id_aktifis']+"</td><td>"+this['id_admin']+"</td><td><a href='index.php?page=<?php echo base64_encode('profile') ?>&amp;nis="+this['nis']+"&amp;ak=true'>"+this['nis']+"</a></td><td>"+this['keterangan']+"</td><td>"+this['tanggal']+"</td>");                                                      
            dataHandler.append(newRow);
         });
    });
}

</script>