<?php
$koneksi= mysqli_connect("localhost","root","","gokostum");

$id_sewa = $_GET['id'];
$status = $_GET['status'];

mysqli_query($koneksi,"UPDATE sewa SET status = '$status' WHERE id_sewa='$id_sewa'");
$query = mysqli_query($koneksi, "SELECT * FROM detail_sewa  INNER JOIN kostum ON kostum.id_kostum = detail_sewa.id_kostum WHERE id_sewa = $_GET[id]");
while($row = mysqli_fetch_array($query)){
	$id_kostum = $row['id_kostum'];
if ($_GET['status'] == 'Y') {
	
  $stok_akhir = $row['stok'] - $row['jumlah'];
	 
}
if ($_GET['status'] == 'N') {
	
  $stok_akhir=$row['stok'];
	 
}
if ($_GET['status'] == 'kembali') {
  $stok_akhir = $row['stok'] + $row['jumlah'];
}
if ($_GET['status'] == '') {
	$stok_akhir=$row['stok'];
}
$update = mysqli_query($koneksi, "UPDATE kostum SET stok ='$stok_akhir' WHERE id_kostum = '$id_kostum'");
echo "$stok_akhir";
}
header("location:sewa.php");



?>