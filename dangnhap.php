
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
        
        <strong><h3 style="text-align: center; font-size:50px">Đăng Nhập</h3></strong>
        <form method="POST" action="">
        <table>
            <tr>
            <td>Tên đăng nhập</td>
            <td><input type="text" name="TenDN"  /></td>
            </tr>
            <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="MatKhau" /></td>
            </tr>
            <tr>
            <td><input type="submit" name="sub" value="Đăng nhâp"/></td>
            </tr>
        </table>
        </form>
        <?php
        include_once("DataProvide_PDO.php");
        if(isset($_POST['sub'])){
            $tendn=$_POST['TenDN'];
            $matkhau=$_POST['MatKhau'];
            $sql=DataProvider_PDO::ExecuteQuery("SELECT * FROM khachhang WHERE TenDN='$tendn' and MatKhau='$matkhau'");
            $rs= $sql->fetch(PDO::FETCH_ASSOC);
            $makh=$rs['MaKH'];
            if($matkhau!=$rs['MatKhau']){
                echo "Sai tên đăng nhập or mật khẩu";
            }
            else{
                $_SESSION['TenDN']=$tendn;
                $_SESSION['MaKH']=$makh;
                echo "<script> window.location = 'layout.php'; </script>";
            }
        }
        ?>
</body>
</html>
