<?php
include("../koneksi.php");
$id_user = $_GET['id_user'];
$username = $_GET['username'];
$password = $_GET['password'];
$nama = $_GET['nama'];
$jenis_kelamin = $_GET['jenis_kelamin'];
$email = $_GET['email'];
$no_telepon = $_GET['telp'];
$alamat = $_GET['alamat'];
$level = $_GET['level'];

$update = "UPDATE user SET id_user='$id_user',
			username='$username',
			password='$password',
			nama = '$nama',
			jenis_kelamin = '$jenis_kelamin',
			email = '$email',
			no_telepon = '$no_telepon',
			alamat = '$alamat',
			level = '$level' WHERE id_user='$id_user'";
$hasil = mysqli_query($koneksi,$update);
if($hasil){
	header("location:user.php");
}else{
	echo "gagal edit data";
}