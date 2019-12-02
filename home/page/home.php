<?php 
    $idusr=$data['id_user'];
    $qjml=mysqli_query($koneksi,"SELECT * FROM saldo WHERE id_user='$idusr'");
    $jml=mysqli_fetch_array($qjml);
    $row=mysqli_num_rows($qjml);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
    
</style>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
    <font style="color: #fff">a</font>
    	<div class="kotak">
            <div class="bgslide-top">
            <div class="slide-content">
                <div id="slideshow">
                    <img name="slid" src="../img/slide/welcome.jpg" />
                    <img name="slid" src="../img/slide/2.jpg" />
                </div>
            </div>
            </div>
        </div>
        <div class="kotak">
        <a href="?menu=saldo">
        	<div class="menu1">
                <div class="ikon"><img src="../img/icon/banknotes-512.png" name="ikon"></div>
                <div class="ikon-text">Pemasukan</div>
                <div class="ikon-text2">Jumlah uang yang dimiliki saat ini</div>
            </div>
        </a>
        <a href="<?php if($row==1){echo"?menu=pengeluaran";}else{echo"index.php?menu=home#addcreat";}?>">
            <div class="menu2">
                <div class="ikon"><img src="../img/icon/checkout-512.png" name="ikon"></div>
                <div class="ikon-text">Pengeluaran</div>
                <div class="ikon-text2">Memasukkan jumlah pengeluaran</div>
            </div>
        </a>
        <a href="<?php if($row==1){echo"?menu=bulan_ini";}else{echo"index.php?menu=home#addcreat";}?>">
            <div class="menu3">
                <div class="ikon"><img src="../img/icon/day-view-512.png" name="ikon"></div>
                <div class="ikon-text">Pengeluaran Bulan Ini</div>
                <div class="ikon-text2">Mencatat jumlah pengeluaran pada bulan ini</div>
            </div>
        </a>
        <a href="<?php if($row==1){echo"?menu=riwayat";}else{echo"index.php?menu=home#addcreat";}?>">
            <div class="menu4">
                <div class="ikon"><img src="../img/icon/date-from-512.png" name="ikon"></div>
                <div class="ikon-text">Riwayat Pengeluaran</div>
                <div class="ikon-text2">Mencatat jumlah riwayat pengeluaran</div>
            </div>
        </a>
        </div>
        <div class="kotak">
        	<div class="bgslide">
            <div class="slide-content">
            	<div id="slideshow1">
    				<img name="slid" src="../img/slide/welcome.jpg" />
                    <img name="slid" src="../img/slide/2.jpg" />
    			</div>
            </div>
            </div>
        </div>
        <!--peringatan ketika belum buat dompet-->
            <div class="tambah" id="addcreat">
                <div>
                    <div class="tambah-header">
                        <font style="font-family: Arial; font-size: 20px; color: #000; padding-left: 2%;">Peringatan...!</font>
                    </div>
                    <div class="attdel">Silahkan buat akun dompet terlebih dahulu di menu <b>Pemasukan->Buat Dompet Baru</b></div>
                        <a href="#"><div class="batal" style="background: #5E5EE4;">Mengerti</div></a>
                    <a href="#"><font color="#fff">a</font></a><br><br><br>
                </div>
            </div>
        <!--end-->
    <script src="../js/jquery.js"></script>
    <script type="text/javascript">
	$("#slideshow > img:gt(0)").hide();
		setInterval (function(){
		$('#slideshow > img:first')
		.fadeOut (1500)
		.next ()
		.fadeIn (1500)
		.end ()
		.appendTo ("#slideshow");
		}, 5000 );	
	</script>
    <script src="../js/jquery.js"></script>
    <script type="text/javascript">
    $("#slideshow1 > img:gt(0)").hide();
        setInterval (function(){
        $('#slideshow1 > img:first')
        .fadeOut (1500)
        .next ()
        .fadeIn (1500)
        .end ()
        .appendTo ("#slideshow1");
        }, 5000 );  
    </script>
</body>
</html>
