<?php 
	session_start();
	include "koneksi.php";
	$tanggal=date("Y-m-d");
	@$proses=$_GET['proses'];

	if($proses=='login'){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query=mysqli_query($koneksi,"SELECT * FROM user WHERE BINARY username='$username' AND password=md5('$password')");
		$num=mysqli_num_rows($query);
		if($num){
			$_SESSION['username']=$username;
			header('location:../home/index.php');
		}
		else{
			header('location:../index.php');
		}
	}
	elseif ($proses=='registrasi'){
		$lokasi_file	=$_FILES['foto']['tmp_name'];
		$nama_file		=$_FILES['foto']['name'];
		$tipe_file		=$_FILES['foto']['type'];
		move_uploaded_file($lokasi_file, "../img/image/$nama_file");
		mysqli_query($koneksi,"INSERT INTO user (nama,alamat,tgl_lahir,foto,username,password) VALUES ('$_POST[nama]','$_POST[alamat]','$_POST[tgl_lahir]','$nama_file','$_POST[username]',md5('$_POST[password]'))");
		header('location:../index.php');
	}
	else if($proses=='buat_saldo'){
		mysqli_query($koneksi,"INSERT INTO saldo (id_user,jml_saldo) VALUES ('$_POST[id_user]','$_POST[jml_saldo]')");
		header('location:../home/index.php?menu=saldo');
	}
	else if($proses=='tambah'){
		mysqli_query($koneksi,"INSERT INTO pemasukan (id_saldo,kode,jumlah,tanggal_in) VALUES ('$_POST[id_saldo]','$_POST[kode]','$_POST[jumlah]','$tanggal')");
		mysqli_query($koneksi,"UPDATE saldo SET jml_saldo=jml_saldo+'$_POST[jumlah]' WHERE id_saldo='$_POST[id_saldo]'");
		header('location:../home/index.php?menu=saldo');
	}
	else if($proses=='delpmskn'){
		mysqli_query($koneksi,"DELETE FROM pemasukan WHERE kode='$_GET[kode]'");
		header('location:../home/index.php?menu=saldo');
	}
	else if($proses=='ubah_saldo'){
		mysqli_query($koneksi,"UPDATE saldo SET jml_saldo='$_POST[jml_saldo]' WHERE id_user='$_POST[id_user]'");
		header('location:../home/index.php?menu=saldo');
	}
	else if($proses=='pengeluaran'){
		
		$qsal=mysqli_query($koneksi,"SELECT jml_saldo FROM saldo WHERE id_user='$_POST[id_user]'");
		$fsal=mysqli_fetch_array($qsal);
		$jsal=$fsal['jml_saldo'];
		$jpeng=$_POST['jumlah'];
		if($jsal<$jpeng){
			header('location:../home/index.php?menu=pengeluaran#peringatan');
		}
		else{
		$qcek=mysqli_query($koneksi,"SELECT tanggal FROM penarikan WHERE tanggal='$tanggal' AND id_user='$_POST[id_user]'");
		$ncek=mysqli_num_rows($qcek);
		if($ncek!=1){
			mysqli_query($koneksi,"INSERT INTO penarikan (id_user,tanggal,jumlah) VALUES ('$_POST[id_user]','$tanggal','$_POST[jumlah]')");
			mysqli_query($koneksi,"INSERT INTO d_penarikan (id_user,jumlah,tanggal,keperluan) VALUES ('$_POST[id_user]','$_POST[jumlah]','$tanggal','$_POST[keperluan]')");
			mysqli_query($koneksi,"UPDATE saldo SET jml_saldo=jml_saldo-'$_POST[jumlah]' WHERE id_user='$_POST[id_user]'");
		}
		else{
			mysqli_query($koneksi,"INSERT INTO d_penarikan (id_user,jumlah,tanggal,keperluan) VALUES ('$_POST[id_user]','$_POST[jumlah]','$tanggal','$_POST[keperluan]')");
			mysqli_query($koneksi,"UPDATE saldo SET jml_saldo=jml_saldo-'$_POST[jumlah]' WHERE id_user='$_POST[id_user]'");
			mysqli_query($koneksi,"UPDATE penarikan SET jumlah=jumlah+'$_POST[jumlah]' WHERE tanggal='$tanggal' AND id_user='$_POST[id_user]'");
		}
		header('location:../home/index.php?menu=pengeluaran');
	}
	}
	else if($proses=='delpengeluaran'){
		mysqli_query($koneksi,"DELETE FROM d_penarikan WHERE id_dpenarikan='$_GET[id]'");
		header('location:../home/index.php?menu=pengeluaran');
	}
	else if($proses=='editpass'){
		$iduser=$_POST['iduser'];
		$sql=mysqli_query($koneksi,"SELECT * FROM user WHERE id_user=$iduser");
		$duser=mysqli_fetch_array($sql);
		$iuser=md5($_POST['passwordl']);
		$passb=md5($_POST['passwordb']);
		$passk=md5($_POST['passwordb2']);
		$detuser=$duser['password'];
		if($iuser==$detuser){
			if($passb==$passk){
				mysqli_query($koneksi,"UPDATE user SET password='$passb' WHERE id_user='$iduser'");
				header('location:../home/index.php?menu=profil');
			}
			else{
				header('location:../home/index.php?menu=profil#pro1');
			}
		}
		else{
			header('location:../home/index.php?menu=profil#pro');
		}
	}
	else if($proses=='editpro'){
		$user=$_POST['iduser'];
		$uname=$_POST['username'];
		$lokasi_file=$_FILES['foto']['tmp_name'];
		$nama_file=$_FILES['foto']['name'];
		$tipe_file=$_FILES['foto']['type'];
		move_uploaded_file($lokasi_file, "../img/image/$nama_file");
		$sql=mysqli_query($koneksi,"SELECT * FROM user WHERE id_user=$user");
		$duser=mysqli_fetch_array($sql);
		$baseuser=$duser['username'];
		if(empty($nama_file)){
			if($uname!=$baseuser){
				mysqli_query($koneksi,"UPDATE user SET nama='$_POST[nama]',alamat='$_POST[alamat]',tgl_lahir='$_POST[tgl_lahir]',username='$_POST[username]' WHERE id_user='$user'");
				header('location:../index.php');
			}
			else{
				mysqli_query($koneksi,"UPDATE user SET nama='$_POST[nama]',alamat='$_POST[alamat]',tgl_lahir='$_POST[tgl_lahir]' WHERE id_user='$user'");
				header('location:../home/index.php?menu=profil');
			}
		}
		else{
			mysqli_query($koneksi,"UPDATE user SET nama='$_POST[nama]',alamat='$_POST[alamat]',tgl_lahir='$_POST[tgl_lahir]',foto='$nama_file',username='$_POST[username]' WHERE id_user='$user'");
			header('location:../home/index.php?menu=profil');	
		}
	}
 ?>	