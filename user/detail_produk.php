<?php
$konek = mysqli_connect("localhost","root","","gokostum");
$id = $_GET['id_kostum'];
$edit = "SELECT * FROM kostum WHERE id_kostum='$id'";
$hasil = mysqli_query($konek,$edit);
while ($data= mysqli_fetch_array($hasil)) {
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><?php echo"$data[nama]";?></h4>
        </div>
        <div class="modal-body">
            
            <div class="form-group">
                <div align="center">
                    <span class="label "><img src="../data_img/<?php echo "$data[gambar]"; ?>" class="img-thumbnail" alt="<?php echo "$data[nama]";?>" width="50%"></span>
                </div>
            </div>
            
           <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <td>Harga</td>
                        <td> : </td>
                        <td><?php echo "Rp.$data[harga]";?></td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td> : </td>
                        <td><?php echo "$data[stok]";?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td> : </td>
                        <td><?php echo "$data[deskripsi]";?></td>
                    </tr>
                </tbody>
            </table>
        
        <div class="modal-footer">
            
        </div>
        <?php
        }
        ?>
    </div>
</div>
</div>