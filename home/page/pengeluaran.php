<?php
	$idusr=$data['id_user'];
	include "../inc/koneksi.php"; 
	$qjml=mysqli_query($koneksi,"SELECT * FROM saldo WHERE id_user='$idusr'");
	$jml=mysqli_fetch_array($qjml);
	$row=mysqli_num_rows($qjml);
	if($row!=1){
		$jumlah=0;
	}
	else{
		$jumlah=$jml['jml_saldo'];
	}
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
		<div class="menu-judul1">Home > pengeluaran</div>
		<div class="jml-saldo">Rp.<?=number_format($jumlah);?></div><br><br>
		<div class="ket">7 Data terakhir yang ditambahkan</div>
		<div class="content-tambah">
			<a href="#add_pengeluaran"><div class="btn-tambah">Tambah Pengeluaran</div></a>
			<?php 
				$jmlh=0;
				$tgl=date('m');
				$thn=date('Y');
				$qts=mysqli_query($koneksi,"SELECT jumlah FROM penarikan WHERE id_user='$idusr' && MONTH(tanggal)='$tgl' && YEAR(tanggal)='$thn'");
				while($ts=mysqli_fetch_array($qts)){
					$jmlh=$jmlh+$ts[jumlah];
				}
			 ?>
			<div class="btn-tambah1">Pengeluaran uang bulan ini sebesar Rp.<?=number_format($jmlh);?></div>
		</div>
		<!--modal buat-->
			<div class="tambah" id="add_pengeluaran">
				<div>
					<div class="tambah-header">
						<font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Pengeluaran</font>
					</div>
					<form action="../inc/proses.php?proses=pengeluaran" method="post">
						<input type="hidden" name="id_user" readonly="readonly"  value="<?=$idusr;?>">
						<input type="text" name="x" readonly="readonly" style="background: #E9DFDF;" value="<?=$data['nama'];?>">
						<input type="number" name="jumlah" required="required" placeholder="Jumlah Pengeluaran...?">
						<input type="text" name="keperluan" required="required" placeholder="keperluan">
						<input type="submit" name="add" value="Tambah" class="batal">
					<a href="#"><div class="batal">Batal</div></a>
					</form>
					<a href="#"><font color="#fff">a</font></a><br><br><br>
				</div>
			</div>
		<!--end buat-->
		<!--modal Peringatan-->
			<div class="tambah" id="peringatan">
				<div>
					<div class="tambah-header">
						<font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Peringatan...!</font>
					</div>
					<div class="attdel">Pengeluaran yang anda masukkan lebih besar dari pada saldo yang anda miliki
					</div>
					<a href="#"><div class="batal" style="background: #5E5EE4;">Close</div></a>
					<a href="#"><font color="#fff">a</font></a><br><br><br>
				</div>
			</div>
		<!--end Peringatan-->
		<table width="100%">
			<tr>
				<th width="5%">No</th>
				<th>Keperluan</th>
				<th>Jumlah</th>
				<th>Tanggal</th>
				<th width="7%">Aksi</th>
			</tr>
			<?php 
				$no=1;
				$qtt=mysqli_query($koneksi,"SELECT * FROM d_penarikan WHERE id_user='$idusr' order by id_dpenarikan desc limit 7");
				while($t=mysqli_fetch_array($qtt)){
			 ?>
			<tr bgcolor="<?php if($no%2){echo "#FFF";}else{echo "#FCF7F7";} ?>">
				<td align="center"><?=$no++;?></td>
				<td><?=$t['keperluan'];?></td>
				<td>Rp.<?=number_format($t['jumlah']);?></td>
				<td><?=date("d/M/Y", strtotime($t['tanggal']));?></td>
				<td align="center"><a href="#hapus<?=$t['id_dpenarikan'];?>" class="batal" style="text-decoration: none;">Hapus</a></td>
			</tr>
			<!--modal Hapus-->
			<div class="tambah" id="hapus<?=$t['id_dpenarikan'];?>">
				<div>
					<div class="tambah-header">
						<font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Hapus Data Pemasukan</font>
					</div>
					<div class="attdel">Data dengan Keperluan <b><?=$t['keperluan'];?></b> akan dihapus..!!</div>
						<a href="../inc/proses.php?proses=delpengeluaran&id=<?=$t['id_dpenarikan'];?>"><div class="batal">Hapus</div></a>
						<a href="#"><div class="batal" style="background: #5E5EE4;">Batal</div></a>
					<a href="#"><font color="#fff">a</font></a><br><br><br>
				</div>
			</div>
		<!--end Hapus-->
			<?php } ?>
		</table>
	</div>
</div>
</body>
</html>