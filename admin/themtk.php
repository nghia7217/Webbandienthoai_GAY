<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <strong><h3 style="text-align: center; font-size:50px">Thêm khách hàng</h3></strong>
    <form method="POST" action="" style="margin-left:500px">
    <table>
        <tr>
            <td>Tên đăng nhập:</td>
            <td><input type="text" name="TenDN"></td>
        </tr>
        <tr>
            <td>Mật khẩu:</td>
            <td><input type="text" name="MatKhau"></td>
        </tr>
        <tr>
            <td>Họ Tên:</td>
            <td> <input type="text" name="HoTen"></td>
        </tr>
        <tr>
            <td>Địa chỉ:</td>
            <td><input type="text" name="DiaChi"></td>
        </tr>
        <tr>
            <td>Diện thoai:</td>
            <td><input type="text" name="DienThoai"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="Email"></td>
        </tr>
        <tr>
            <td><input type="submit" name="sub"  value="Thêm"></td>
        </tr>
    </table>
    </form>
    <?php
        include("../DataProvide_PDO.php");
        if(isset($_POST['sub'])){
            $tendn=$_POST['TenDN'];
            $matkhau=$_POST['MatKhau'];
            $hoten=$_POST['HoTen'];
            $diachi=$_POST['DiaChi'];
            $dienthoai=$_POST['DienThoai'];
            $email=$_POST['Email'];
            $kt=DataProvider_PDO::ExecuteQuery("SELECT TenDN FROM khachhang WHERE TenDN='$tendn'");
            $rs= $kt->fetch(PDO::FETCH_ASSOC);
            if($tendn==''||$matkhau==''||$hoten==''){
                echo "Vui lòng kiểm tra thông tin!";
            }
            else if($rs['TenDN']==$tendn){
                echo "Đã có tên đăng nhập!";
            }
            else{
                DataProvider_PDO::ExecuteQuery("INSERT INTO khachhang(TenDN,MatKhau,HoTen,DiaChi,DienThoai,Email) VALUES ('$tendn','$matkhau','$hoten','$diachi','$dienthoai','$email');");
                echo "Thêm tài khoản thành công!";
            }
        }
    ?>
</body>
</html>