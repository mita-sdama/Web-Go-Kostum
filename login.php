<?php
session_start();
if(isset($_SESSION['username'] )){
	header("Location:user/user.php");
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
			<div class="row">
				<div class="header">
					<img src="img/logo.png">
				</div>
				<div class="login">
					
					<?php
					if(isset($_POST['login'])){
						include("koneksi.php");
						
							$username	= $_POST['username'];
							$password	= $_POST['password'];
						
						
						$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
						if(mysqli_num_rows($query) == 0){
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.<br> Periksa Kembali Username Dan Password Anda</div>';
						}else{
							$row = mysqli_fetch_assoc($query);
							
							if($row['level'] ==  'admin'){
								$_SESSION['id_user']=$row['id_user'];
								$_SESSION['username']=$username;
								$_SESSION['password']=$password;
								$_SESSION['level']='admin';
								header("Location: admin/dashboard.php");
							}else if($row['level'] == 'user'){
								$_SESSION['id_user']=$row['id_user'];
								$_SESSION['username']=$username;
								$_SESSION['password']=$password;
								$_SESSION['level']='user';
								header("Location: user/user.php");
							}else{
								echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
							}
						}
					}
					?>
					
					<form role="form" action="" method="post">
						
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password" required autofocus />
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />
						</div>
					</form>
					Belum memiliki akun ? <a href="signup.php">sign up</a><br>
					
				</div>
				
				<footer>
					<div class="foot">&copy; <?php echo date('Y'); ?> </div>
				</footer>
			</div>
			
		</div>
		<!-- jQuery -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js" ></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="Hello World"></script>
	</body>
</html>