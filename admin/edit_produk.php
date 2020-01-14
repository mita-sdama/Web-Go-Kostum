<?php
include("../koneksi.php");
$id = $_GET['id_kostum'];
$edit = "SELECT * FROM kostum where id_kostum='$id'";
$hasil1 = mysqli_query($koneksi,$edit);
$data1 = mysqli_fetch_array($hasil1);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="update_produk.php" name="modal-popup" enctype="multipart/form-data" method="POST" align="center">
                <div class="form-group">
                
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        ID Produk
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <input type="text" name="id_kostum" class="form-control" value="<?php echo $id ?>" readonly />
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        kategori
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        
                        <select name="id_kategori" class="form-control">
                            <?php
                            $tampil="SELECT * FROM kategori ORDER BY nama_kategori";
                            $hasil= mysqli_query($koneksi,$tampil);
   
                            while ($data=mysqli_fetch_array($hasil)) {
                            if ($data1['id_kategori']==$data['id_kategori']) {
                                 echo "<option value=\"$data[id_kategori]\" selected>$data[nama_kategori]</option>";
                            }else{
                                 echo "<option value=\"$data[id_kategori]\">$data[nama_kategori]</option>";
                            }
                           
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        nama
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <input type="text" name="nama" class="form-control" value="<?php echo "$data1[nama]"; ?>" placeholder="nama kostum" autofocus required >
                    </div>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                
            </div>
            <div class="form-group">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    gambar
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    :
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    <input type="file" name="gambar" class="form-control"></br>
                    <img src="../data_img/<?php echo"$data1[gambar]";?>" width="100" height="100">
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                
            </div>
            <div class="form-group">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    harga
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    :
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    <input type="number" name="harga" value="<?php echo "$data1[harga]"; ?>" class="form-control">
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                
            </div>
            <div class="form-group">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    stok
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    :
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    <input type="number" name="stok" value="<?php echo "$data1[stok]"; ?>" class="form-control">
                   
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                
            </div>
            <div class="form-group">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    deskripsi
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    :
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                     <textarea name="deskripsi" class="form-control" rows="3" required="required"  placeholder="Deskripsi produk"><?php echo "$data1[deskripsi]"; ?></textarea>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    
                </div>
                
            </div>
            
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