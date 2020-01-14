<?php
include("../koneksi.php");
$id = $_GET['id_kategori'];
$edit = "SELECT * FROM kategori WHERE id_kategori='$id'";
$hasil = mysqli_query($koneksi,$edit);
$data = mysqli_fetch_array($hasil);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="update_kategori.php" name="modal-popup" enctype="multipart/form-data" method="GET" align="center">
                <div class="form-group">
                    
                </div>
                
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        ID User
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <input type="text" name="id_kategori" class="form-control" value="<?php echo $id ?>" readonly />
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
                        
                        <input type="text" name="nama_kategori" class="form-control" value="<?php echo "$data[nama_kategori]"; ?>" placeholder="nama lengkap" autofocus required >
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