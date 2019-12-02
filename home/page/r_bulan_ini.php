<?php
	$idusr=$data['id_user'];
	$nm_bulan=array(
		'01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'Novemeber','12'=>'Desember'
	);
	$tahun=date("Y", strtotime($_GET['bln']));
	$bulan=date("m", strtotime($_GET['bln']));
	include "../inc/koneksi.php"; 
	/*Hitung Pengeluaran*/
	$jmlh=0;
	$qts=mysqli_query($koneksi,"SELECT jumlah FROM penarikan WHERE id_user='$idusr' && MONTH(tanggal)='$bulan' && YEAR(tanggal)='$tahun'");
	while($ts=mysqli_fetch_array($qts)){
		$jmlh=$jmlh+$ts[jumlah];
	}
	/*End*/
	/*Pagination*/
	$perhal=6;
    $jumlah_record=mysqli_query($koneksi,"SELECT * FROM penarikan WHERE id_user='$idusr' && MONTH(tanggal)='$bulan' && YEAR(tanggal)='$tahun'");
    $jum=mysqli_num_rows($jumlah_record);
    $halaman=ceil($jum / $perhal);
    $page=(isset($_GET['g'])) ? $_GET['g']:1;
    $posisi=($page - 1) * $perhal;
	/*End*/
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="content-menu">
	<div class="content-menu1">
		<div class="menu-judul1">Home > pengeluaran Bulan <?=$nm_bulan[$bulan];?></div><br><br>
		<div class="ket">Detail Pengeluaran Pada Bulan <?=$nm_bulan[$bulan];?></div>
		<div class="content-tambah">
			<div class="btn-tambah1">Pengeluaran uang bulan ini sebesar Rp.<?=number_format($jmlh);?></div>
			<form action="" method="post" name="cr">
				<input type="text" name="search" placeholder="Cari berdasarkan tanggal">
				<input type="submit" name="cari" value="Cari">
			</form>
		</div>
		<table width="100%">
			<tr>
				<th width="5%">No</th>
				<th>Tanggal</th>
				<th>Jumlah</th>
				<th width="7%">Aksi</th>
			</tr>
			<?php
				$noo=1+$posisi;
				$cari=$_POST['search']; 
				$qp=mysqli_query($koneksi,"SELECT * FROM penarikan WHERE id_user='$idusr' && MONTH(tanggal)='$bulan' && YEAR(tanggal)='$tahun' && DAY(tanggal) like '%$cari%' limit $posisi,$perhal");
				while($t=mysqli_fetch_array($qp)){
			 ?>
			<tr bgcolor="<?php if($noo%2){echo "#FFF";}else{echo "#FCF7F7";} ?>">
				<td align="center"><?=$noo++;?></td>
				<td><?=date("d/M/Y", strtotime($t['tanggal']));?></td>
				<td>Rp.<?=number_format($t['jumlah']);?></td>
				<td align="center"><a href="#detail<?=$t['id_penarikan'];?>" class="batal" style="text-decoration: none;">Detail</a></td>
			</tr>
			<!--modal Detail-->
			<div class="tambah" id="detail<?=$t['id_penarikan'];?>">
				<div>
					<div class="tambah-header">
						<font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Detail Pengeluaran</font>
					</div>
					<div class="row-det">
						<div class="no">No</div>
						<div class="kep">Keperluan</div>
						<div class="jum">Jumlah</div>
					</div>
					<?php 
						$no=1;
						$dtgl=$t['tanggal'];
						$qtt=mysqli_query($koneksi,"SELECT * FROM d_penarikan WHERE id_user='$idusr' AND tanggal='$dtgl'");
						while($dp=mysqli_fetch_array($qtt)){
			 		?>
					<div class="row-det">
						<div class="no1"><?=$no++;?></div>
						<div class="kep1"><?=$dp['keperluan'];?></div>
						<div class="jum1">Rp.<?=number_format($dp['jumlah']);?></div>
					</div>
					<?php } ?>
					<font color="#fff">abcg</font>
						<a href="#"><div class="batal" style="background: #5E5EE4;">Tutup</div></a>
					<a href="#"><font color="#fff">a</font></a><br><br><br>
				</div>
			</div>
		<!--end Hapus-->
			<?php } ?>
		</table>
		<ul class="paging">
			<?php 
				for($x=1;$x<=$halaman;$x++){
			 ?>
			<li><a <?php if($x==$page){echo "class='active-paging'";} ?> href="?menu=r_bulan_ini&bln=<?=$_GET[bln]?>&g=<?=$x;?>"><?=$x;?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>
</body>
</html>