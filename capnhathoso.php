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
        
        if(!isset($_SESSION['TenDN'])){
            echo "<script> window.location = 'layout.php'; </script>";
        }
        else{
            $tendn=$_SESSION['TenDN'];
        }
        include_once("DataProvide_PDO.php");
        $kt= DataProvider_PDO::ExecuteQuery("SELECT * FROM khachhang WHERE TenDN='$tendn'");
        $rs= $kt->fetch(PDO::FETCH_ASSOC);
    ?>
    <strong><h3 style="text-align: center; font-size:50px">Cập nhật hồ sơ</h3></strong>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input disabled='disabled' type="text" name="TenDN" <?php echo "value='$tendn'";?> /></td>
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
            <td><input type="submit" name="sub" value="Cập nhật"/></td>
            </tr>
        </table>
        </form>
        <?php
            if(isset($_POST['sub'])){
                $hoten=$_POST['HoTen'];
                $diachi=$_POST['DiaChi'];
                $sdt=$_POST['DienThoai'];
                $email=$_POST['Email'];
                $sql=DataProvider_PDO::ExecuteQuery("UPDATE khachhang SET HoTen='$hoten',
                DiaCHi='$diachi',DienThoai='$sdt',Email='$email'
                WHERE TenDN='$tendn'");
                if(!empty($sql)){
                    echo "<script language='javascript'>confirm('Cập nhật thành công!');</script>";
                    echo "<script> window.location = 'layout.php?page=capnhathoso';  </script>";
                }
            }
        ?>
</body>
</html>