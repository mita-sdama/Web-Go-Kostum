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
            <form class="form-horizontal" action="update_sewa.php" name="modal-popup" method="GET">
                <div class="form-group">
                    
                </div>
                
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        ID sewa
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <?php echo $id ?>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Tanggal Sewa
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        
                        <?php echo "$data[tgl_sewa]"; ?>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Tanggal Kembali
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        
                        <?php echo "$data[tgl_kembali]"; ?>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Ubah Status
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        
                        <div class="form-group" style="padding-left: 10px;">
                            <?php
                            if($data['status'] == "Y"){
                            ?>
                            <label>
                            <?php
                            echo "<input type='radio' name='status' value='kembali' checked='checked'>Pengembalian Sewa";
                            
                            ?>
                            </label>
                            <label>
                            <?php
                            // echo "<input type='radio' name='status' value='Y' checked='checked'>Y";
                            ?>
                            </label>
                            <?php
                            }else{
                                ?>
                            <label>
                            <?php
                            // echo "<input type='radio' name='status' value='N' checked='checked'> N";
                            ?>
                            </label>
                            <label>
                            <?php
                             echo "<input type='radio' name='status' value='Y' checked='checked'> Disewakan";
                             echo "<input type='radio' name='status' value='N'> Tidak Disewakan";
                            ?>
                            </label>
                            <?php
                            }
                            ?>
                           
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <p></p>
                <!-- tabel produk yang dbeli -->
                <table class="table table-bsewaed table-hover">
                    <thead style="background-color: #dd4b83;color: #ffffff;">
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
                        <table class="table table-bsewaed table-hover">
                            <thead  style="background-color: #dd4b83;color: #ffffff;">
                                <tr>
                                    <th colspan="2">DATA KUSTOMER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $kustomer = "SELECT * FROM user,sewa WHERE user.id_user= sewa.id_user AND id_sewa='$id'";
                                $has2 = mysqli_query($koneksi,$kustomer);
                                $dat2 = mysqli_fetch_array($has2);
                                ?>
                                <tr>
                                    <td>Nama </td>
                                    <td><?php echo "$dat2[nama]"; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat </td>
                                    <td><?php echo "$dat2[alamat]"; ?></td>
                                </tr>
                                <tr>
                                    <td>No.Telp </td>
                                    <td><?php echo "$dat2[no_telepon]"; ?></td>
                                </tr>
                                <tr>
                                    <td>Email </td>
                                    <td> <?php echo "$dat2[email]"; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
";
?>