	<?php
include '../koneksi.php';
session_start();
$user=$_SESSION['id_user'];
// var_dump($_SESSION);
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
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		
		<!-- header-->
		<nav class="navbar navbar-collapse navbar-fixed-top" data-spy="affix" data-offset-top="0">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="../img/logo.jpg" class="img-responsive" alt="Image" width="50%"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#home" class="menu-main">Beranda</a></li>
						<li><a href="#produk" class="menu-main">Kostum</a></li>
						<li><a href="#tentang" class="menu-main">Tentang Kami</a></li>
						
						<?php
						if (isset($_SESSION['username'])) {
						?>
						<li><a href="cart.php" class="menu-main"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></span></a></li>
						<li><a class="menu-main" data-toggle="modal" href='#modal-history'><span class="glyphicon glyphicon-bell"></span></a></li>
						
						<li><a href="../logout.php"><?php echo $_SESSION['username']; ?> &nbsp; <span class="glyphicon glyphicon-off"></span></a></li>
						
						<?php
						}else{
						?>
						<li><a href="../login.php">Sign in</a></li>
						<?php
						}
						?>
						
					</ul>
				</div>
			</div>
		</nav>
		<!--carousel -->
		<div id="home">
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
		<!--produk-->
		<div id="produk" class="container" >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="produc">
					<h1>sewa Kostum</h1>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<form action="" method="post">
					<input type="text" name="input" placeholder="Cari produk" style="width:200px; padding:5px;">
					<input type="submit" name="cari" value="search" class="btn btn-info" style="padding:5px;">
				</form>
				<p></p>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<?php
				$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
				$limit = 12;
				$limit_start = ($page - 1) * $limit;
				$input_cari = @$_POST['input'];
				$cari=@$_POST['cari'];
				if($cari){
				if($input_cari != ""){
				$tampil = "SELECT * FROM kostum WHERE nama like '%$input_cari%' LIMIT ".$limit_start.",".$limit;
				}else{
				$tampil = "SELECT * FROM kostum LIMIT ".$limit_start.",".$limit;
				}
				}else{
				$tampil="SELECT * FROM kostum LIMIT ".$limit_start.",".$limit;
				}
				$hasil = mysqli_query($koneksi,$tampil);
				$cek=mysqli_num_rows($hasil);
				if($cek < 1){
				?>
				<i>" Produk tidak ditemukan " </i>
				<?php
				}
				else{
				$hasil = mysqli_query($koneksi,$tampil);
				while ($data=mysqli_fetch_array($hasil)){
				?>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<div class="thumbnail" >
						<img src="../data_img/<?php echo"$data[gambar]";?>" class="img-responsive">
						<div class="caption">
							<h3><?php echo"$data[nama]";?></h3>
							<p>
								Rp.<?php echo"$data[harga]";?>
							</p>
							<p>
								<?php
								
								if (isset($_SESSION['username'])) {
								if ($data['stok'] == 0) {
									?>
									<a class="btn btn-default" disabled="true"><span class="glyphicon glyphicon-shopping-cart" style="padding: 3px;"></span></a>
									<?php
								}else{
									?>
								<a class="btn btn-primary" onclick="addToCart('<?php echo $data['id_kostum']; ?>', '<?php echo $data['nama']; ?>')"><span class="glyphicon glyphicon-shopping-cart" style="padding: 3px;"></span></a> <?php } 
								
								}
								?>
								<a href="" class="btn btn-warning open_modal btnku
								" id="<?php echo"$data[id_kostum]";?>" data-target="#ModalDetail" data-toggle="modal">Detail</a>
							</p>
						</div>
					</div>
				</div>
				<?php
				
				}
				?>
				<div class="col-xs-12">
					<ul class="pagination">
						<!-- LINK FIRST AND PREV -->
						<?php
						if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
						?>
						<li class="disabled"><a href="#">First</a></li>
						<li class="disabled"><a href="#">&laquo;</a></li>
						<?php
						} else { // Jika buka page ke 1
						$link_prev = ($page > 1) ? $page - 1 : 1;
						?>
						<li><a href="user.php?page=1">First</a></li>
						<li><a href="user.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
						<?php
						}
						?>
						<!-- LINK NUMBER -->
						<?php
						// Buat query untuk menghitung semua jumlah data
						$sql2 = mysqli_query($koneksi,"SELECT * FROM kostum");
						$get_jumlah = mysqli_num_rows($sql2);
						$jumlah_page = ceil($get_jumlah / $limit); // Hitung jumlah halamanya
						$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
						$start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
						$end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
						for ($i = $start_number; $i <= $end_number; $i++) {
						$link_active = ($page == $i) ? 'class="active"' : '';
						?>
						<li <?php echo $link_active; ?>><a href="user.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php
						}
						?>
						<!-- LINK NEXT AND LAST -->
						<?php
						// Jika page sama dengan jumlah page, maka disable link NEXT nya
						// Artinya page tersebut adalah page terakhir
						if ($page == $jumlah_page) { // Jika page terakhir
						?>
						<li class="disabled"><a href="#">&raquo;</a></li>
						<li class="disabled"><a href="#">Last</a></li>
						<?php
						} else { // Jika bukan page terakhir
						$link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
						?>
						<li><a href="user.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
						<li><a href="user.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
			<?php
			}
			?>
			<!-- Detail Produk -->
			<div id="ModalDetail" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			</div>
		</div>
	</div>
</div>

	<!--History Sewa -->
	<div class="modal fade" id="modal-history">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">History Sewa <?php echo $_SESSION['username'];?></h4>
				</div>
				<div class="modal-body">
					<div class="box-body table-responsive">
									<table id="dtborder" class="table table-bordered table-striped">
										<thead >
											<tr style="font-size: 10px;">
												<th>ID Order</th>
												<th>ID Produk</th>
												<th>Tgl sewa</th>
												<th>Tgl Kembali</th>
												<th>Jumlah</th>
												<th>Status</th>
												
											</tr>
										</thead>
										<tbody>
											<?php
											include("../koneksi.php");
											$tampil = "SELECT * FROM sewa INNER JOIN user ON sewa.id_user=user.id_user 
											INNER JOIN detail_sewa ON detail_sewa.id_sewa= sewa.id_sewa AND sewa.id_user='$user' WHERE sewa.status<>'kembali'";
											$hasil = mysqli_query($koneksi,$tampil);
											while ($data=mysqli_fetch_array($hasil)) {
											echo "
											<tr style=\"font-size:11px;\">
														
														<td> $data[id_sewa]</td>
														<td> $data[id_kostum]</td>
														<td> $data[tgl_sewa]</td>
														<td> $data[tgl_kembali]</td>
														<td> $data[jumlah]</td>
														<td> $data[status]</td>

													
														</tr>
														";
												}  ?>
											</tbody>
											<tfoot>
											
											</tfoot>
										</table>
										</div><!-- /.box-body -->
				</div>
				<div class="modal-footer" style="text-align: left;">
					status <b>Y</b> : sewa bisa diambil <br>
					status <b>N</b> : sewa tidak dapat diambil 
				</div>
			</div>
		</div>
	</div>
	<!--tentang-->
	<div id="tentang">
		<div class="container-fluid" style="background: url(../img/3.jpg);background-attachment: fixed;">
			<div class="ttg"><h1>Tentang Kami</h1>
				<!-- 	<img src="../img/logo.jpg" class="img-thumbnail" alt="Image"> -->
				<h4>GoKostum merupakan tempat penyewaan sewa kostum online yang mudah dan terpercaya </h4>
				<h6> yang terletak di Jl.Kesumbah 30F Malang, Jawa Timur </h6>
				<br>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 10px;">
					<div class="col-md-2 col-sm-4">
						<div class="thumbnail">
							<div class="single-about-detail clearfix">
								<div class="about-img">
									<img class="img-responsive img-circle" src="../img/thor.png" alt="">
								</div>
								<div class="about-details">
									<div class="pentagon-text">
										<h1>G</h1>
									</div>
									<h3> K </h3>
									<p></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="thumbnail">
							<div class="single-about-detail clearfix">
								<div class="about-img">
									<img class="img-responsive img-circle" src="../img/thor.png" alt="">
								</div>
								<div class="about-details">
									<div class="pentagon-text">
										<h1>A</h1>
									</div>
									<h3> O </h3>
									<p></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="thumbnail">
							<div class="single-about-detail clearfix">
								<div class="about-img">
									<img class="img-responsive img-circle" src="../img/thor.png" alt="">
								</div>
								<div class="about-details">
									<div class="pentagon-text">
										<h1>D</h1>
									</div>
									<h3>S </h3>
									<p></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="thumbnail">
							<div class="single-about-detail clearfix">
								<div class="about-img">
									<img class="img-responsive img-circle" src="../img/thor.png" alt="">
								</div>
								<div class="about-details">
									<div class="pentagon-text">
										<h1>I</h1>
									</div>
									<h3>T</h3>
									<p></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="thumbnail">
							<div class="single-about-detail clearfix">
								<div class="about-img">
									<img class="img-responsive img-circle" src="../img/thor.png" alt="">
								</div>
								<div class="about-details">
									<div class="pentagon-text">
										<h1>N</h1>
									</div>
									<h3>U</h3>
									<p></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="thumbnail">
							<div class="single-about-detail clearfix">
								<div class="about-img">
									<img class="img-responsive img-circle" src="../img/thor.png" alt="">
								</div>
								<div class="about-details">
									<div class="pentagon-text">
										<h1>G</h1>
									</div>
									<h3>M</h3>
									<p></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- footer-->
	<footer class="footer" style="margin-top: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 footer-para" style="text-align: center;">
					<p style="font-family: century gothic;">&copy; Mita Septiana D - <?php  echo date('Y');?></p>
				</div>
				
			</div>
		</div>
	</footer>
	<!-- jQuery -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="../js/bootstrap.min.js" ></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="Hello World"></script>
	<script>
	$(document).ready(function(){
	// Add scrollspy to <body>
						$('body').scrollspy({target: ".navbar", offset: 50});
						// Add smooth scrolling on all links inside the navbar
						$("#myNavbar a").on('click', function(event) {
						// Make sure this.hash has a value before overriding default behavior
						if (this.hash !== "") {
						// Prevent default anchor click behavior
						event.preventDefault();
						// Store hash
						var hash = this.hash;
						// Using jQuery's animate() method to add smooth page scroll
						// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
						$('html, body').animate({
						scrollTop: $(hash).offset().top
						}, 800, function(){
						// Add hash (#) to URL when done scrolling (default click behavior)
						window.location.hash = hash;
						});
						}  // End if
						});
						});
		</script>
		<!-- Modal Detail-->
		<script type="text/javascript">
		$(document).ready(function (){
		$(".open_modal").click(function (e){
		var m = $(this).attr("id");
		$.ajax({
		url: "detail_produk.php",
		type: "GET",
		data : {id_kostum: m,},
		success: function (ajaxData){
		$("#ModalDetail").html(ajaxData);
		$("#ModalDetail").modal('show',{backdrop: 'true'});
		}
		});
		});
		});
		</script>
		<!-- cart kostum -->
		<script type="text/javascript">
			$(document).ready(function() {
				addToCart = function(id_kostum, nama) {
					$.ajax({
						method: 'POST',
						url: 'add-to-cart.php',
						data: 'id_kostum=' + id_kostum,
						dataType: 'html',
						success: function(response) {
							if(response != '') {
								alert(" Kostum "+nama+" berhasil ditambahkan ke keranjang sewa");
							}
						}
					})
				}
			})
		</script>

	
	</body>
</html>