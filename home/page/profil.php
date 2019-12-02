<?php
	$idusr=$data['id_user'];
	$protgl=array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'Novemeber','12'=>'Desember');
	$blnpro=date("m", strtotime($data['tgl_lahir']));
	$jmlh=0;
		$tgl=date('m');
		$thn=date('Y');
		$qts=mysqli_query($koneksi,"SELECT jumlah FROM penarikan WHERE id_user='$idusr' && MONTH(tanggal)='$tgl' && YEAR(tanggal)='$thn'");
		while($ts=mysqli_fetch_array($qts)){
			$jmlh=$jmlh+$ts[jumlah];
		}
		$jmlhp=0;
		$qjml=mysqli_query($koneksi,"SELECT * FROM saldo WHERE id_user='$idusr'");
		$jmlp=mysqli_fetch_array($qjml);
		$qtsp=mysqli_query($koneksi,"SELECT jumlah FROM pemasukan WHERE id_saldo='$jmlp[id_saldo]' AND MONTH(tanggal_in)='$tgl'");
		while($tsp=mysqli_fetch_array($qtsp)){
			$jmlhp=$jmlhp+$tsp[jumlah];
		}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
	<!--peringatan password lama tidak sama-->
        <div class="tambah" id="pro">
            <div>
                <div class="tambah-header">
                    <font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Peringatan...!</font>
                </div>
                <div class="attdel">Maaf password lama anda tidak sesuai</b></div>
                    <a href="#"><div class="batal" style="background: #5E5EE4;">Ok</div></a>
                <a href="#"><font color="#fff">a</font></a><br><br><br>
            </div>
        </div>
    <!--end-->
    <!--peringatan password baru tidak cocok-->
        <div class="tambah" id="pro1">
            <div>
                <div class="tambah-header">
                    <font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Peringatan...!</font>
                </div>
                <div class="attdel">Maaf password baru anda tidak cocok</b></div>
                    <a href="#"><div class="batal" style="background: #5E5EE4;">Ok</div></a>
                <a href="#"><font color="#fff">a</font></a><br><br><br>
            </div>
        </div>
    <!--end-->
    <div class="content-menu">
    	<div class="content-menu1">
    		<div class="menu-judul1">Home > Profil</div>
			<div class="font-ket">My Profile</div>
			<div class="pro-kot">
				<button class="pro-edit" id="klik">Edit Profil</button>
			</div>
			<div class="edit-kotak">
				<div class="pro-kotak-edit1">
					<fieldset class="field">
						<legend class="fnt">Edit Profil User</legend>
						<form action="../inc/proses.php?proses=editpro" method="post" enctype="multipart/form-data">
							<input type="hidden" name="iduser" value="<?=$data['id_user'];?>">
							<table class="edt" width="100%">
								<tr>
									<td>Nama</td>
									<td><input type="text" name="nama" value="<?=$data['nama'];?>"></td>
								</tr>
								<tr>
									<td>Username</td>
									<td>
										<input type="text" name="username" value="<?=$data['username'];?>"><br>
										<font style="color: #D72929; font-family: Tahoma; font-size: 12px;padding-top: 10px;">
											Ingat...! username baru akan digunakan saat login
										</font>
									</td>
								</tr>
								<tr>
									<td>Foto</td>
									<td><input type="file" name="foto"></td>
								</tr>
								<tr>
									<td>Tgl Lahir</td>
									<td><input type="date" name="tgl_lahir" value="<?=$data['tgl_lahir'];?>"></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><input type="text" name="alamat" value="<?=$data['alamat'];?>"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="edit" value="Edit"></td>
								</tr>
							</table>
						</form>
					</fieldset>
				</div>
				<div class="pro-kotak-edit2">
					<fieldset>
						<legend class="fnt">Edit Password</legend>
						<form action="../inc/proses.php?proses=editpass" method="post">
							<input type="hidden" name="iduser" value="<?=$data['id_user'];?>">
							<table class="edt" width="100%">
								<tr>
									<td>Password Lama</td>
									<td><input type="password" name="passwordl" required="required"></td>
								</tr>
								<tr>
									<td>Password Baru</td>
									<td><input type="password" name="passwordb" required="required"></td>
								</tr>
								<tr>
									<td>Konfirmasi Password Baru</td>
									<td><input type="password" name="passwordb2" required="required"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="editp" value="Edit"></td>
								</tr>
							</table>
						</form>
					</fieldset>
				</div>
			</div>
			<div class="pro-kotak1">
				<img name="pro-page" src="../img/image/<?=$data['foto']?>" />
			</div>
			<div class="pro-kotak2">
				<div class="pro-font1"><b><?=$data['nama'];?></b></div>
				<div class="pro-font2"><?=$data['username'];?></div>
				<div class="pro-font2"><?=date("d", strtotime($data['tgl_lahir']));?>-<?=$protgl[$blnpro];?>-<?=date("Y", strtotime($data['tgl_lahir']));?></div>
				<div class="pro-font2"><?=$data['alamat'];?></div>
			</div>
			<div class="pro-kotak3">
				<div class="pro-kotak31">
					<div class="pro-kotak31-kotak">
						<div class="pro-kotak31-font1">Pengeluaran Bulan Ini</div>
						<div class="pro-kotak31-font2">Rp.<?=number_format($jmlh);?></div>
					</div>
					<div class="pro-kotak31-kotak">
						<img src="../img/icon/checkout-512.png" name="pro-ikon">
					</div>
				</div>
				<div class="pro-kotak32">
					<div class="pro-kotak31-kotak">
						<div class="pro-kotak31-font1">Pemasukan Bulan Ini</div>
						<div class="pro-kotak31-font2">Rp.<?=number_format($jmlhp);?></div>
					</div>
					<div class="pro-kotak31-kotak">
						<img src="../img/icon/banknotes-512.png" name="pro-ikon">
					</div>
				</div>
			</div>
			<font style="color:#FFF">padding</font>
    	</div>
    </div>
    <script type="text/javascript" src="../js/js.js"></script>
    <script type="text/javascript">
    	$(function(){
    		$('#klik').click(function(){
    			$(".edit-kotak").slideToggle('slow');
    		});
    	});
    </script>
</body>
</html>