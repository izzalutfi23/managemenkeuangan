<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="content-menu">
	<div class="content-menu1">
		<div class="menu-judul1">Home > Riwayat</div><br><br>
		<div class="ket">Tahun</div><br>
			<?php
				$idusr=$data['id_user'];
				$qtahun=mysqli_query($koneksi,"SELECT * FROM penarikan WHERE id_user='$idusr' GROUP BY YEAR(tanggal)");
				while($dt=mysqli_fetch_array($qtahun)){
			 ?>
			 <a href="?menu=r_bulan&th=<?=$dt[tanggal];?>">
			 <div class="r-tahun">
			 	<?=date("Y", strtotime($dt['tanggal']));?>
			 </div>
			</a>
			 <?php } ?>
	</div>
</div>
</body>
</html>