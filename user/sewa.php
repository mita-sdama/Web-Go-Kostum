<?php
session_start();

require_once('../koneksi.php');

$id_user = ($_POST['id_user'] != '' ? $_POST['id_user'] : '');
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
	echo "Keranjang masih kosong.";
}

if(!empty($id_user)) {
	if(count($_SESSION['cart']) == 0) {
		echo "Keranjang masih kosong.";
	} else {
		$order = mysqli_query($koneksi, "INSERT INTO sewa (id_user,tgl_sewa,tgl_kembali,status) VALUES ('$id_user','$tgl_pinjam','$tgl_kembali','meminta')");
		$last_id = $koneksi->insert_id;

		foreach($_SESSION['cart'] as $key => $value) {
			$id_kostum = $value['id_kostum'];
			$qty = $value['qty'];

			mysqli_query($koneksi, "INSERT INTO detail_sewa (id_sewa, id_kostum, jumlah) VALUES ($last_id, '$id_kostum', '$qty')");
			
		}
		echo "Transaksi Berhasil, Tunggu Konfirmasi Admin untuk mengambil sewa";
		unset($_SESSION['cart']);
	}
} else {
	echo "Anda harus login terlebih dahulu.";
}