<?php
include("../koneksi.php");
$id_kategori = $_GET['id_kategori'];
$nama_kategori = $_GET['nama_kategori'];

$input = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";
$hasil = mysqli_query($koneksi,$input);

if ($hasil) {
	header("location:kategori.php");
}else{
	echo "<a href=kategori.php>gagal</a>";
}
?>