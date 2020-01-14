<?php
session_start();

require_once('../koneksi.php');

$kostum = mysqli_query($koneksi, "SELECT * FROM kostum WHERE id_kostum = '$_POST[id_kostum]'");
$row = mysqli_fetch_array($kostum);

if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

$new = 1;

if(count($_SESSION['cart']) == 0) {
	array_push($_SESSION['cart'], array('id_kostum' => $_POST['id_kostum'], 'qty' => 1));
	echo "Berhasil ditambahkan ke keranjang.";
} else {
	foreach($_SESSION['cart'] as $key => $value) {
		if(in_array($_POST['id_kostum'], $value)) {
			if($value['id_kostum'] === $_POST['id_kostum']) {
				$new = 0;

				if($value['qty'] >= $row['stok']) {
					$qty = $value['qty'];
				} else {
					$qty = $value['qty'] + 1;
				}

				$_SESSION['cart'][$key]['qty'] = $qty;
				echo "Berhasil ditambahkan ke keranjang.";
			}
		}
	}

	if($new) {
		array_push($_SESSION['cart'], array('id_kostum' => $_POST['id_kostum'], 'qty' => 1));
		echo "Berhasil ditambahkan ke keranjang.";
	}
}