<?php
session_start();

foreach($_SESSION['cart'] AS $key => $value) {
	if(in_array($_POST['id_kostum'], $value)) {
		if($value['id_kostum'] === $_POST['id_kostum']) {
			unset($_SESSION['cart'][$key]);
			echo "Keranjang berhasil dihapus.";
		}
	}
}