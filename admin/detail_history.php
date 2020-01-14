<?php
include("../koneksi.php");
$id = $_GET['id_sewa'];
$edit = "SELECT * FROM sewa WHERE id_sewa='$id'";
$hasil = mysqli_query($koneksi,$edit);
$data = mysqli_fetch_array($hasil);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Detail sewa</h4>
        </div>
        <div class="modal-body">
            
                <!-- tabel produk yang dbeli -->
                <table class="table table-bsewaed table-hover">
                    <thead style="background-color: #69aae0;color: #ffffff;">
                        <tr>
                            <th>Nama Kostum</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $detail = "SELECT kostum.nama,detail_sewa.jumlah,kostum.harga FROM detail_sewa INNER JOIN kostum ON kostum.id_kostum=detail_sewa.id_kostum INNER JOIN sewa ON sewa.id_sewa=detail_sewa.id_sewa WHERE sewa.id_sewa=$id";
                        $has1 = mysqli_query($koneksi,$detail);
                        while ($dat1=mysqli_fetch_array($has1)) {
                        echo "
                        <tr style=\"font-size:11px;\">
                            
                            <td> $dat1[nama]</td>
                            <td> $dat1[jumlah]</td>
                            <td> Rp.$dat1[harga]</td>
                            <td> Rp.".($dat1['jumlah']*$dat1['harga'])."</td>
                            
                            
                            ";
                            $total = $total+($dat1['jumlah']*$dat1['harga']);
                            
                            }
                            
                            ?>
                            
                        </tr>
                        <tr>
                            <td colspan="4" align="right"><b><?php echo "Total :Rp.".$total; ?></b></td>
                        </tr>
                       
                    </tbody>
                </table>
                <div class="modal-footer">
                    
                </div>
        </div>
    </div>
</div>
";
?>