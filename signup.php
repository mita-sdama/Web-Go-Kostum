<?php
include("koneksi.php");
$tampil = "SELECT max(id_user) FROM user";
$carikode = mysqli_query($koneksi, $tampil);
$datakode = mysqli_fetch_array($carikode);
if($datakode){
	$nilaikode = substr($datakode[0],1);
	$kode = (int) $nilaikode;
	$kode = $kode + 1;
	$hasilkode = "U".str_pad($kode,5,"0",STR_PAD_LEFT);
}else{
	$hasilkode = "U00001";
}
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GoKostum</title>
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row1">
				<div class="header">
					<h2>Sign Up</h2>
				</div>
				<div class="login">
					<form role="form" action="proses_signup.php" method="post">
						<div class="form-group">
							<input type="text" name="id_user" class="form-control"  value="<?php echo $hasilkode ?>" readonly />
						</div>
						<div class="form-group">
							<input type="text" name="nama"  class="form-control" placeholder="Nama Lengkap" required autofocus />
						</div>
						<div class="form-group">
							<input type="radio" name="jenis_kelamin" value="P"> Perempuan
							<input type="radio" name="jenis_kelamin" value="L"> Laki-laki
						</div>
						<div class="form-group">
							<input type="text" name="email"  class="form-control" placeholder="email" required autofocus />
						</div>
						<div class="form-group">
							<input type="number" name="telp"  class="form-control" placeholder="No Hp" required autofocus />
						</div>
						<div class="form-group">
							<textarea name="alamat" id="inputAlamat" class="form-control" placeholder="Alamat" rows="3" required="required"></textarea>
						</div>
						<div class="form-group">
							<input type="text" name="username"  class="form-control" placeholder="Username" required autofocus />
						</div>
						<div class="form-group">
							<input type="password" name="password"  class="form-control" placeholder="password" required autofocus />
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-primary btn-block" value="daftar" />
						</div>
					</form>
					
				</div>
				
				<footer>
					<div class="foot">&copy; <?php echo date('Y'); ?> </div>
				</footer>
			</div>
		</form>
		<!-- jQuery -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js" ></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="Hello World"></script>
	</body>
</html>