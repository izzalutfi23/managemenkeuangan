<?php
	session_start();
	include "../inc/koneksi.php"; 
	if($_SESSION['username']==""){
		header('location:../index.php');
	}

	$user=$_SESSION['username'];
	$quser=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$user'");
	$data=mysqli_fetch_array($quser);
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/utama.css" />
<link rel="stylesheet" type="text/css" href="../css/profil.css">
<link rel="stylesheet" type="text/css" href="../css/saldo.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-manage</title>
</head>

<body>
    <div class="header">
        <a href="index.php">
    	<div class="header-font">
        	E-Manage
        </div>
        </a>
        <div class="header-profil">
            <div class="mkotak" id="tombol">
                <div class="garis"></div>
                <div class="garis"></div>
                <div class="garis"></div>
            </div>
        	<div class="dropdown">
            	<input type="checkbox" id="checkbox_toggle" />
                <label for="checkbox_toggle"><img name="profile" src="../img/image/<?=$data['foto']?>" /><div class="profil-text"><?php echo $data['nama']; ?></div></label>
                <ul class="drop">
                <?php 
                    @$p=$_GET['menu'];
                 ?>
                	<li <?php if($p==""){echo "class='active-menu'";} ?>><a href="index.php"><img src="../img/icon/home.png" name="img-menu">Home</a></li>
                    <li <?php if($p=='profil'){echo "class='active-menu'";} ?>><a href="?menu=profil"><img src="../img/icon/user.png" name="img-menu">Profile</a></li>
                    <li><a href="../inc/logout.php"><img src="../img/icon/logout.png" name="img-menu">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mmenu">
        <ul class="lmenu">
            <a href="index.php"><li <?php if($p==""){echo "class='active-mmenu'";} ?>>Home</li></a>
            <a href="?menu=profil"><li <?php if($p=="profil"){echo"class='active-mmenu'";} ?>>Profile</li></a>
            <a href="../inc/logout.php"><li>Logout</li></a>
        </ul>
    </div>
    <div class="content">
    	<?php 
    		error_reporting(0);
    		switch ($_GET['menu']) {
    			default:
    				include "page/home.php";
    				break;
    			case "profil":
    				include "page/profil.php";
    				break;
                case "saldo":
                    include "page/saldo.php";
                    break;
                case "pengeluaran":
                    include "page/pengeluaran.php";
                    break;
                case "bulan_ini":
                    include "page/bulan_ini.php";
                    break;
                case "riwayat":
                    include "page/riwayat.php";
                    break;
                case "r_bulan":
                    include "page/r_bulan.php";
                    break;
                case "r_bulan_ini":
                    include "page/r_bulan_ini.php";
                    break;
                case "dokumentasi":
                    include "page/dokumentasi.php";
                    break;
    		}
    	 ?>
    </div>
    <div style="clear: both;">
    <div class="footer"><font face="Arial" color="#FFFFFF" size="-2" style="padding-left:1.5%;">Copyright &copy; 2017-<?=date('Y')?> by Muhammad Izza Lutfi</font></div>
    <script type="text/javascript" src="../js/js.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#tombol').click(function(){
                $(".mmenu").slideToggle('slow');
            });
        });
    </script>
</body>
</html>