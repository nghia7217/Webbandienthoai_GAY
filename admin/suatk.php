<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $makh=$_GET['id'];
        include_once("../DataProvide_PDO.php");
        $kt= DataProvider_PDO::ExecuteQuery("SELECT * FROM khachhang WHERE MaKH='$makh'");
        $rs= $kt->fetch(PDO::FETCH_ASSOC);
    ?>
    <strong><h3 style="text-align: center; font-size:50px">Cập nhật hồ sơ</h3></strong>
    
    <form method="POST" action="" style="margin-left:500px">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="TenDN" <?php echo "value='$rs[TenDN]'";?> /></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="text" name="MatKhau" <?php echo "value='$rs[MatKhau]'";   ?> /></td>
            </tr>
            <tr>
                <td>Họ Tên:</td>
                <td><input type="text" name="HoTen" <?php echo "value='$rs[HoTen]'";   ?> /></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="DiaChi" <?php echo "value='$rs[DiaChi]'";   ?>/></td>
            </tr>
            <tr>
                <td>Số điện thoại:</td>
                <td><input type="text" name="DienThoai" <?php echo "value='$rs[DienThoai]'";   ?>/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="Email" <?php echo "value='$rs[Email]'";   ?>/></td>
            </tr>
            <tr>
            <td><input type="submit" name="sub" value="Cập nhật"/></td> <button><a href="admin.php?page=qltk">Quay lại</a></button>
            </tr>
        </table>
        </form>
        <?php
            if(isset($_POST['sub'])){
                $tendn=$_POST['TenDN'];
                $mk=$_POST['MatKhau'];
                $hoten=$_POST['HoTen'];
                $diachi=$_POST['DiaChi'];
                $sdt=$_POST['DienThoai'];
                $email=$_POST['Email'];
                $sql=DataProvider_PDO::ExecuteQuery("UPDATE khachhang SET TenDN='$tendn',MatKhau='$mk' ,HoTen='$hoten',
                DiaCHi='$diachi',DienThoai='$sdt',Email='$email'
                WHERE MaKH='$makh'");
                if(!empty($sql)){
                    echo "<script language='javascript'>confirm('Cập nhật thành công!');</script>";
                    echo "<script> window.location = 'admin.php?page=qltk';  </script>";
                }
            }
        ?>
</body>
</html>