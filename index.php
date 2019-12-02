
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
    <div class="content">
        	<ul class="menu">
                <?php 
                    @$p=$_GET['menu'];
                 ?>
                <a href="index.php"><li <?php if($p==""){echo "class='active-menu'";} ?>>Login</li></a>
                <a href="?menu=registrasi"><li <?php if($p=="registrasi"){echo "class='active-menu'";} ?>>Registrasi</li></a>
            </ul>
            <div style="clear: both;">
            <div class="kotak">
                <?php 
                    error_reporting(0);
                    switch ($_GET['menu']) {
                        case 'registrasi':
                            include "page/registrasi.php";
                            break;
                        
                        default:
                            include "page/login.php";
                            break;
                    }
                 ?>
            </div>
    </div>
</body>
</html>