<?php
$konek = mysqli_connect("localhost","root","","gokostum");

$content='
<style type="text/css">
.tabel{
	border-collapse:collapse;
}
.tabel th{ 
	padding-left:38px;
	padding-top:15px;
	padding-bottom:15px;
	padding-right:38px;
	background-color:#dd4b83; 
	color:#fff; 
}
.tabel td{
	padding:15px;
}
.tot{
	background-color:#dd4b83; 
}
.nil{
	background-color:orange; 
}
</style>
';


$content .= '
<page>
<div align="center">
<table width="100%">
<tr>
<td style="padding-left:200px;" > 
<img src="images/logo.jpg" style="width:200px;"> 
<h1 style="color:#dd4b83;"> LAPORAN TRANSAKSI  </h1>
</td>
</tr>
</table>
<hr style="border:2px #dd4b83 solid; ">

<div style="padding:5px;">
</div>

<table border="1px" class="tabel" align="center">
<tr>

	<th> Produk </th>
	<th> Sewa</th>
	<th>  Kembali </th>
	<th> Jumlah</th>
	<th> Harga </th>
	<th> Total </th>
</tr>';

	$tampil = "SELECT * FROM detail_sewa INNER JOIN kostum ON kostum.id_kostum=detail_sewa.id_kostum INNER JOIN sewa ON sewa.id_sewa = detail_sewa.id_sewa WHERE sewa.status='Kembali'";
	$hasil = mysqli_query($konek, $tampil);
	$total = mysqli_num_rows($hasil);
	$jml=0;
	$no = 1;
	while ($data=mysqli_fetch_array($hasil)){
		$content .= '
			<tr>
				
				<td> '.$data['id_kostum'].'</td>
				<td> '.$data['tgl_sewa'].'</td>
				<td> '.$data['tgl_kembali'] .'</td>
				<td> '.$data['jumlah'].'</td>
				<td> Rp.'.$data['harga'].'</td>
				<td> Rp.'.$data['jumlah']*$data['harga'].'</td>
				</tr>

		';

		$no++;
		
		 $jml += ($data['jumlah']*$data['harga']);
	}
	
		$content .= '
		<tr>
		<td colspan="5" class="tot"> <b>Total</b> </td>
		<td class="nil"> <b>Rp.'.$jml.'</b></td>
		</tr>
		';
	
	$content .='
</table>
</div>
</page>';
require_once('html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF ('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('laporan_transaksi.pdf');
?>