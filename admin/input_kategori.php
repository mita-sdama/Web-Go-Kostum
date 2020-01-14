<?php
include("../koneksi.php");
$id_kategori = $_GET['id_kategori'];
$nama_kategori = $_GET['nama_kategori'];

$input = "INSERT INTO kategori(id_kategori,nama_kategori) VALUES
('$id_kategori','$nama_kategori')";
$hasil = mysqli_query($koneksi,$input);

if ($hasil) {
	header("location:kategori.php");
}else{
	echo "<a href=kategori.php>gagal</a>";
}
?>