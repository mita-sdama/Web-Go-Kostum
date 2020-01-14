<?php
include("../koneksi.php");
$id = $_GET['id_user'];
$edit = "SELECT * FROM user WHERE id_user='$id'";
$hasil = mysqli_query($koneksi,$edit);
$data = mysqli_fetch_array($hasil);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit User</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="update_user.php" name="modal-popup" enctype="multipart/form-data" method="GET" align="center">
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
                        <input type="text" name="id_user" class="form-control" value="<?php echo $id ?>" readonly />
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
                        
                        <input type="text" name="nama" class="form-control" value="<?php echo "$data[nama]"; ?>" placeholder="nama lengkap" autofocus required >
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        Jenis Kelamin
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <div class="radio">
                            <?php
                            if($data['jenis_kelamin'] == "L"){
                            ?>
                            <label>
                            <?php
                            echo "<input type='radio' name='jenis_kelamin' value='P'> Perempuan";
                            
                            ?>
                            </label>
                            <label>
                            <?php
                            echo "<input type='radio' name='jenis_kelamin' value='L' checked='checked'> Laki-laki";
                            ?>
                            </label>
                            <?php
                            }else{
                                ?>
                            <label>
                            <?php
                            echo "<input type='radio' name='jenis_kelamin' value='P' checked='checked'> Perempuan";
                            ?>
                            </label>
                            <label>
                            <?php
                             echo "<input type='radio' name='jenis_kelamin' value='L' > Laki-laki";
                           
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
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        Email
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <input type="text" name="email" class="form-control" value="<?php echo "$data[email]"; ?>" placeholder="example@gmail.com" autofocus required >
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        No Telepon
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <input type="number" name="telp" class="form-control" value="<?php echo "$data[no_telepon]"; ?>" placeholder="no telepon" autofocus required >
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        Alamat
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <textarea name="alamat" class="form-control" rows="3" required="required"  placeholder="Alamat lengkap"><?php echo "$data[alamat]"; ?></textarea>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        Username
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <input type="text" name="username" class="form-control" value="<?php echo "$data[username]"; ?>" placeholder="username" autofocus required >
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        Password
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <input type="text" name="password" class="form-control" value="<?php echo "$data[password]"; ?>" autofocus required >
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        Level
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        :
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <select name="level" id="inputLevel" class="form-control" required="required">
                            <?php
                            if ($data[level] == 'admin') {
                            ?>
                            <option value="admin" selected> Admin </option>
                            <?php 
                             } elseif ($data[level] == 'user') {
                                ?>

                            <option value="user" selected> User</option>
                            <option value="operator"> Operator </option>
                                <?php
                             }else{
                                ?>

                            <option value="user"> User</option>
                            <option value="operator" selected> Operator </option>
                                <?php
                             }
                            ?>
                            
                            
                        </select>
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