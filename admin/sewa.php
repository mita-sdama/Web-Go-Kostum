<?php
include("../koneksi.php");
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
		<link rel="stylesheet" href="../css/dataTables.bootstrap.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.btn-primary{
				padding: 10px;
			}
			.btn-danger{
				padding: 10px;
			}
		</style>
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
					<ul class="nav" width="50%">
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
								
								<p>kostum</p>
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
							<a class="navbar-brand" href="#">SEWA</a>
						</div>
						<div class="collapse navbar-collapse">
							
						</div>
					</div>
				</nav>
				<div class="content">
					<div class="container-fluid">
						<div class="card card-map">
							<div class="header">
								
								
								<!-- <a href="#tambah" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Tambah</a> -->
								<p></p>
								<div class="box-body table-responsive">
									<table id="dtborder" class="table table-bordered table-striped">
										<thead >
											<tr style="font-size: 10px;">
												<th>ID Sewa</th>
												<th>User</th>
												<th>Tgl sewa</th>
												<th>Tgl Kembali</th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include("../koneksi.php");
											$tampil = "SELECT * FROM sewa ORDER BY id_sewa";
											$hasil = mysqli_query($koneksi,$tampil);
											while ($data=mysqli_fetch_array($hasil)) {
											echo "
											<tr style=\"font-size:11px;\">
														
														<td> $data[id_sewa]</td>
														<td> $data[id_user]</td>
														<td> $data[tgl_sewa]</td>
														<td> $data[tgl_kembali]</td>
														<td> $data[status]</td>

														";
														
														// if ($data['status']=='N') {
														// 	echo"
														// 	<td align=\"center\">
														// 	<a href=\"#\" class=\"btn btn-primary\" disabled='true' style=\"background-color:grey;color:#fff;\">Detail</a>&nbsp;
													
														// 	</td>";
														// }else{
														echo"
														<td align=\"center\">
															<a href=\"#\" class=\"btn btn-primary open_modal btnku
															\" id=$data[id_sewa] >Detail</a>&nbsp;
													
															</td>
														</tr>
														";
													// }
												}  ?>
											</tbody>
											<tfoot>
											
											</tfoot>
										</table>
										</div><!-- /.box-body -->
									</div>
								</div>
							</div>
						</div>
					
					
					<footer class="footer" style="background-color: #000;">
						<div class="container-fluid">
							<nav class="pull-left">
								
							</nav>
							<div class="copyright pull-right">
								&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="glyphicon glyphicon-heart"></i> by <a href="http://www.GoApotik.com">Gokostum Team</a>
							</div>
						</div>
					</footer>
				</div></div>

			<!-- modal detail-->
<div id="Modaldetail" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>
		</div>


			<!-- jQuery -->
			<script src="../js/jquery-3.2.1.min.js"></script>
			<!-- Bootstrap JavaScript -->
			<script src="../js/bootstrap.min.js"></script>
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src="Hello World"></script>
			<script src="../js/jquery.dataTables.min.js"></script>
			<script src="../js/dataTables.bootstrap.js"></script>
						 <script type="text/javascript">
            $(function() {
                $('#dtborder').dataTable();
                
            });
        </script>


			<script type="text/javascript">
            $(document).ready(function (){
                $(".open_modal").click(function (e){
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "detail_sewa.php",
                        type: "GET",
                        data : {id_sewa: m,},
                        success: function (ajaxData){
                            $("#Modaldetail").html(ajaxData);
                            $("#Modaldetail").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
            </script>
		</body>
	</html>