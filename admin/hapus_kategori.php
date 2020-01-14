<?php
include("../koneksi.php");
$id = $_GET['id'];

$hapus = "DELETE FROM kategori WHERE id_kategori='$id'";
$hasil = mysqli_query($koneksi,$hapus);

if ($hasil) {
	header("location:kategori.php");
}else{
	echo "hapus data gagal";
}
?>