<?php
include("../koneksi.php");

$id_kostum = $_POST['id_kostum'];
$id_kategori = $_POST['id_kategori'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];
$nama_file = $_FILES['gambar']['name'];
$lokasi_gambar = $_FILES['gambar']['tmp_name'];
$produk_name = date('d-m-Y-H-i-s').$nama_file;
$folder = "../data_img/$produk_name";


if (!empty($_FILES['gambar']['name'])) {
	if (move_uploaded_file($lokasi_gambar,"$folder")) {
	$query = "UPDATE kostum SET id_kategori='$id_kategori',
				nama = '$nama', gambar='$produk_name', harga='$harga',
				stok='$stok',deskripsi='$deskripsi' WHERE id_kostum='$id_kostum'
				";
	
	}else{
		echo "gambar gagal diupload";
	}

}else{
$query = "UPDATE kostum SET id_kategori='$id_kategori',
				nama = '$nama', harga='$harga',
				stok='$stok',deskripsi='$deskripsi' WHERE id_kostum='$id_kostum'
				";

}

$sql = mysqli_query($koneksi,$query);

	if ($sql) {
		header("location:produk.php");
	}else{
		echo "edit data gagal";
	}
?>

