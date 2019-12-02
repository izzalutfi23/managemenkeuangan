<?php 
	$idusr=$data['id_user'];
	$qcek=mysqli_query($koneksi,"SELECT id_user FROM saldo WHERE id_user='$idusr'");
	$row=mysqli_num_rows($qcek);
	if($row!=1){
		$param='Buat Dompet Baru';
	}
	else{
		$param='Tambah';
	}
	$qjml=mysqli_query($koneksi,"SELECT * FROM saldo WHERE id_user='$idusr'");
	$jml=mysqli_fetch_array($qjml);
	$row=mysqli_num_rows($qjml);
	if($row!=1){
		$jumlah=0;
	}
	else{
		$jumlah=$jml['jml_saldo'];
	}
	$qkode=mysqli_query($koneksi,"SELECT MAX(kode) FROM pemasukan");
    $dkode=mysqli_fetch_array($qkode);
    if($dkode){
        $kodeterakhir=$dkode[0];
        $kodeterakhir=substr($kodeterakhir, 5);
        $kodeterakhir=(int)$kodeterakhir;
        $kodebaru=$kodeterakhir+1;
        $kodebaru="PMSKN".str_pad($kodebaru,3,"0",STR_PAD-LEFT);
    }
    else{
        echo "PMSKN001";
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
		<div class="menu-judul1">Home > saldo</div>
		<div class="jml-saldo">Rp.<?=number_format($jumlah);?></div><br><br>
		<div class="ket">7 Data terakhir yang ditambahkan</div>
		<div class="content-tambah">
			<a href="#<?=$param;?>"><div class="btn-tambah"><?=$param;?></div></a>
			<?php if($row==1){ ?>
			<a href="#ubah"><div class="btn-tambah">Ubah Sisa Uang saat Ini</div></a>
			<?php }else{} ?>
			<?php 
				$jmlh=0;
				$tgl=date('m');
				$qts=mysqli_query($koneksi,"SELECT jumlah FROM pemasukan WHERE id_saldo='$jml[id_saldo]' AND MONTH(tanggal_in)='$tgl'");
				while($ts=mysqli_fetch_array($qts)){
					$jmlh=$jmlh+$ts[jumlah];
				}
			 ?>
			<div class="btn-tambah1">Pemasukan uang bulan ini sebesar Rp.<?=number_format($jmlh);?></div>
		</div>
		<!--modal buat-->
			<div class="tambah" id="Buat Dompet Baru">
				<div>
					<div class="tambah-header">
						<font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Buat Dompet Baru</font>
					</div>
					<form action="../inc/proses.php?proses=buat_saldo" method="post">
						<input type="hidden" name="id_user" readonly="readonly"  value="<?=$idusr;?>">
						<input type="text" name="x" readonly="readonly" style="background: #E9DFDF;" value="<?=$data['nama'];?>">
						<input type="text" name="jml_saldo" placeholder="Jumlah Uang Anda Saat Ini..?">
						<input type="submit" value="Buat" class="batal">
					<a href="#"><div class="batal">Batal</div></a>
					</form>
					<a href="#"><font color="#fff">a</font></a><br><br><br>
				</div>
			</div>
		<!--end buat-->
		<!--modal Ubah-->
			<div class="tambah" id="ubah">
				<div>
					<div class="tambah-header">
						<font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Ubah Siasa Uang</font>
					</div>
					<form action="../inc/proses.php?proses=ubah_saldo" method="post">
						<input type="hidden" name="id_user" readonly="readonly"  value="<?=$idusr;?>">
						<input type="text" name="x" readonly="readonly" style="background: #E9DFDF;" value="<?=$data['nama'];?>">
						<input type="text" name="x" readonly="readonly" style="background: #E9DFDF;" placeholder="Uang saat ini : Rp.<?=number_format($jumlah);?>">
						<input type="number" name="jml_saldo" placeholder="Jumlah Baru">
						<input type="submit" value="Ubah" class="batal">
					<a href="#"><div class="batal">Batal</div></a>
					</form>
					<a href="#"><font color="#fff">a</font></a><br><br><br>
				</div>
			</div>
		<!--end ubah-->
		<!--modal tambah-->
			<div class="tambah" id="Tambah">
				<div>
					<div class="tambah-header">
						<font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Tambah Pemasukan</font>
					</div>
					<form action="../inc/proses.php?proses=tambah" method="post">
						<input type="hidden" name="id_saldo" value="<?=$jml['id_saldo']?>">
						<input type="number" name="x" readonly="readonly" placeholder="<?=$data['nama']?>" style="background: #E9DFDF;">
						<input type="text" name="kode" readonly="readonly" value="<?=$kodebaru;?>" style="background: #E9DFDF;">
						<input type="number" name="jumlah" placeholder="Jumlah">
						<input type="text" name="tanggal_in" readonly="readonly" value="<?=date('d/m/Y')?>" readonly="readonly" style="background: #E9DFDF;">
						<input type="submit" value="Tambah" class="batal">
					<a href="#"><div class="batal">Batal</div></a>
					</form>
					<a href="#"><font color="#fff">a</font></a><br><br><br>
				</div>
			</div>
		<!--end tambah-->
		<table width="100%">
			<tr>
				<th width="5%">No</th>
				<th>Kode</th>
				<th>Jumlah</th>
				<th>Tanggal</th>
				<th width="7%">Aksi</th>
			</tr>
			<?php 
				$no=1;
				$qtt=mysqli_query($koneksi,"SELECT * FROM pemasukan WHERE id_saldo='$jml[id_saldo]' order by kode desc limit 7");
				while($t=mysqli_fetch_array($qtt)){
			 ?>
			<tr bgcolor="<?php if($no%2){echo "#FFF";}else{echo "#FCF7F7";} ?>">
				<td align="center"><?=$no++;?></td>
				<td><?=$t['kode'];?></td>
				<td>Rp.<?=number_format($t['jumlah']);?></td>
				<td><?=date("d/M/Y", strtotime($t['tanggal_in']));?></td>
				<td align="center"><a href="#hapus<?=$t['kode'];?>" class="batal" style="text-decoration: none;">Hapus</a></td>
			</tr>
			<!--modal Hapus-->
			<div class="tambah" id="hapus<?=$t['kode'];?>">
				<div>
					<div class="tambah-header">
						<font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Hapus Data Pemasukan</font>
					</div>
					<div class="attdel">Data dengan kode <b><?=$t['kode'];?></b> akan dihapus..!!</div>
						<a href="../inc/proses.php?proses=delpmskn&kode=<?=$t['kode'];?>"><div class="batal">Hapus</div></a>
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