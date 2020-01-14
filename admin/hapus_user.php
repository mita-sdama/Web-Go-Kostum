<?php
include("../koneksi.php");
$id = $_GET['id'];

$hapus = "DELETE FROM user WHERE id_user='$id'";
$hasil = mysqli_query($koneksi,$hapus);

if ($hasil) {
	header("location:user.php");
}else{
	echo "hapus data gagal";
}
?>