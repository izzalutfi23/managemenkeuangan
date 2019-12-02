<?php 
	$tahun=date("Y", strtotime($_GET['th']));
	$idusr=$data['id_user'];
	$bulan=array(
		'01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'Novemeber','12'=>'Desember'
	);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="content-menu">
	<div class="content-menu1">
		<div class="menu-judul1">Home > Riwayat > <?=$tahun;?></div><br><br>
		<div class="ket">Bulan</div><br>
		<?php 
			$qtahun=mysqli_query($koneksi,"SELECT * FROM penarikan WHERE YEAR(tanggal)='$tahun' AND id_user='$idusr' GROUP BY MONTH(tanggal)");
			while($dt=mysqli_fetch_array($qtahun)){
		 ?>
		 <a href="?menu=r_bulan_ini&bln=<?=$dt[tanggal];?>">
		 <div class="r-tahun">
		 	<?=$bulan[date("m", strtotime($dt['tanggal']))];?>
		 </div>
		</a>
		 <?php } ?>
	</div>
</div>
</body>
</html>