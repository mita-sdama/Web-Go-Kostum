<?php
include("../koneksi.php");
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$email = $_POST['email'];
$no_telepon = $_POST['telp'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];

$input = "INSERT INTO user (id_user,username,password,nama,jenis_kelamin,email,no_telepon,alamat,level) VALUES
('$id_user','$username','$password','$nama','$jenis_kelamin','$email','$no_telepon','$alamat','$level')";
$hasil = mysqli_query($koneksi,$input);

if ($hasil) {
	header("location:user.php");
}else{
	echo "<a href=user.php>gagal</a>";
}
?>