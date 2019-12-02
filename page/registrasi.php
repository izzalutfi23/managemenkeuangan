<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="font-log">Registrasi</div>
	<form action="inc/proses.php?proses=registrasi" method="post" enctype="multipart/form-data" class="reg">
		<input type="text" name="nama" required="required" placeholder="Nama">
		<input type="text" name="alamat" required="required" placeholder="Alamat">
		<input type="date" required="required" name="tgl_lahir">
		<input type="file" name="foto">
		<input type="text" required="required" name="username" placeholder="Username">
		<input type="password" required="required" name="password" placeholder="Password">
		<input type="submit" name="login" value="Daftar">
	</form>
</body>
</html>