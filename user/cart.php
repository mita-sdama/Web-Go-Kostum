<?php
include '../koneksi.php';
session_start();
$user=$_SESSION['id_user'];
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GoKostum </title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>


				<div class="container-fluid" style="padding: 20px; background-color: #dd4b83;">
					<button type="button" class="close" onclick="history.back(-1);" style="font-weight: bold; font-size: 30px;">&times;</button>
				<h3 style="font-family: century gothic; color: #fff;" >Keranjang Sewa <span class="glyphicon glyphicon-shopping-cart"></span></h3>
				</div>
				
			<div class="container">
			<div class="modal-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>nama</th>
							<th>qty</th>
							<th>sub total</th>
							<th> Aksi </th>
						</tr>
					</thead>
					<tbody>
						<?php
							if (isset($_SESSION['cart'])) {
								if (count($_SESSION['cart']) != 0) {
									$i =1;
									$total = 0;
									foreach ($_SESSION['cart'] as $key => $value) {
										$kostum = mysqli_query($koneksi,"SELECT * FROM kostum WHERE id_kostum = '$value[id_kostum]'");
										$row = mysqli_fetch_array($kostum);
						?>
						<tr class="<?php echo "row".$i;?> ">
							<th scope="row"><?php echo $i;?></th>
							<td><?php echo $row['nama']; ?></td>
							<td><input type="number" min=1 max="<?php echo $row['stok'] ?>" step="1" value="<?php echo $value['qty']; ?>"
							onchange="updateCart('<?php echo $row['id_kostum'] ?>','<?php echo $row['nama'] ?>',$(this).val())" class="form-control" ></td>
							
							<td><?php echo ($row['harga'] * $value['qty']); ?></td>
							<td><button class="btn btn-danger" onclick="deleteFormCart('<?php echo $row['id_kostum'] ?>','<?php echo $row['nama'] ?>',
								'<?php echo "row" . $i; ?>'),window.location.reload();"><span class="glyphicon glyphicon-remove"></span></button></td>
								<?php $total += ($row['harga'] * $value['qty']); ?>
							</tr>
							<?php
							$i++;
							}
							}else{
							?>
							<tr>
								<td colspan="5">keranjang kosong</td>
							</tr>
							<?php
									}
								}else{
							?>
							<tr>
								<td colspan="5">keranjang kosong</td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<tfoot>
						
						</tfoot>
					</table>
					<?php
					if (!empty($_SESSION['cart'])) {
					?>
					<h5>Biaya Sewa : <b>Rp.<?php echo $total;?></b></h5>
				</div>
				</div>
				<div class="modal-footer">
					<center>

					<form id="checkout" role="form">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom: 10px;">
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								Tanggal Pinjam
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<input type="date" name="tgl_pinjam" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date ('Y-m-d'); ?>" readonly>
							</div>
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								Tanggal Kembali
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<input type="date" name="tgl_kembali" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d",mktime(0,0,0,date("n"),date("j")+3,date("Y")));?>" readonly>
							</div>
						</div>
						
						</center>
							<h5 align="left" style="padding-left: 77px;">Note : <br>Batas Peminjaman sewa 3 hari<br> dihitung dari tanggal sewa sekarang</h5>
						<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" /> <!-- SESSION -->
						<button type="submit" class="btn btn-info" style="background-color: #dd4b83;padding: 12px;margin-right: 30px;font-family: century gothic;font-size: 16px; ">sewa</button>
					</form>

					<?php
						} else{
					?>
					<button type="submit" class="btn" disabled="true">sewa</button>
					<?php
					}
					?>
					
		<!-- jQuery -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="../js/bootstrap.min.js" ></script>
			<!-- Aksi cart-->
		<script type="text/javascript">
			$(document).ready(function() {
				updateCart = function(id_kostum, nama, qty) {
					$.ajax({
						method: 'POST',
						url: 'update-cart.php',
						data: 'id_kostum=' + id_kostum + '&qty=' + qty,
						dataType: 'html',
						success: function(response) {
							if(response != '') {
								document.location.href = "";
							}
						}
					})
				}
				deleteFormCart = function(id_kostum, nama, row) {
					$.ajax({
						method: 'POST',
						url: 'delete-cart.php',
						data: 'id_kostum=' + id_kostum,
						dataType: 'html',
						success: function(response) {
							if(response != '') {
								$('.' + row).html('');
								document.location.href = "";
							}
						}
						})
				}
				$('#checkout').on('submit', (function(e) {
					e.preventDefault();
					$.ajax({
						method: 'POST',
						url: 'sewa.php',
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(response) {
							alert(response);
							document.location.href = "user.php";
						}
					})
				}))
			})
		</script>
		</body>
</html>