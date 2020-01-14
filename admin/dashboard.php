<?php
include "../koneksi.php";
session_start();
if(empty($_SESSION)){
	header("Location:../index.php");
}else{
    if($_SESSION['level']!="admin")
    {
        header("Location:../index.php");
    }
    
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
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link href="../css/paper-dashboard.css" rel="stylesheet"/>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="wrapper">
			<div class="sidebar" data-background-color="white" data-active-color="danger">
				<div class="sidebar-wrapper">
					<div class="logo">
						<a href="http://www.GoKostum.com" class="simple-text">
							<img src="../img/logo.jpg" class="img-responsive" alt="Image" width="50%">
						</a>
					</div>
					<ul class="nav">
						<!-- <li class="active">
								<a href="dashboard.html">
										
										<p>Dashboard</p>
								</a>
						</li> -->
						<li>
							<a href="user.php">
								
								<p>User</p>
							</a>
						</li>
						<li>
							<a href="kategori.php">
								
								<p>Kategori</p>
							</a>
						</li>
						<li>
							<a href="produk.php">
								
								<p>Kostum</p>
							</a>
						</li>
						<li>
							<a href="sewa.php">
							
								<p>Sewa</p>
							</a>
						</li>
						<li>
							<a href="laporan.php" target="_blank">
								
								<p><span class="glyphicon glyphicon-download-alt"></span> Laporan</p>
							</a>
						</li>
						<li>
							<a href="../logout.php">
								
								<p>logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<nav class="navbar navbar-default" style="background-color: #fff;">
					<div class="container-fluid">
						<div class="navbar-header" >
							<!-- <button type="button" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar bar1"></span>
							<span class="icon-bar bar2"></span>
							<span class="icon-bar bar3"></span>
							</button> -->
							<a class="navbar-brand" href="#">Welcome, <?php echo $_SESSION['username']; ?></a>
						</div>
						<div class="collapse navbar-collapse">
							
						</div>
					</div>
				</nav>
				<div class="content">
					<div class="container-fluid">
						<div class="card card-map">
							<div class="header">
								
								<!--carousel -->
	
			<div id="carousel-id" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-id" data-slide-to="0" class=""></li>
					<li data-target="#carousel-id" data-slide-to="1" class=""></li>
					<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<img src="../img/1.jpg">
						<div class="container">
							<div class="carousel-caption">
								
							</div>
						</div>
					</div>
					<div class="item">
						
						<img src="../img/2.jpg">
						
						<div class="container">
							<div class="carousel-caption">
								
							</div>
						</div>
					</div>
					<div class="item active">
						<img src="../img/3.jpg">
						<div class="container">
							<div class="carousel-caption">
								
							</div>
						</div>
					</div>

				</div>
				<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
	

							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer" style="background-color: #000;">
				<div class="container-fluid">
					<nav class="pull-left">
						
					</nav>
					<div class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.GoKostum.com">GoKostum Team</a>
					</div>
				</div>
			</footer>
			<!-- jQuery -->
			<script src="../js/jquery-3.2.1.min.js"></script>
			<!-- Bootstrap JavaScript -->
			<script src="../js/bootstrap.min.js"></script>
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src="Hello World"></script>
		</body>
	</html>