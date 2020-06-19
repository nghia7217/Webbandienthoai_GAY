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
?>
<strong><h3 style="text-align: center; font-size:50px">Đổi mật khẩu</h3></strong>
<?php
echo "
<form action='layout.php?page=doimatkhau' method= 'post'>
        Tên đăng nhập:
        <input disabled='disabled' type='text' name= 'TenDN' value='$tendn'/>
        Mật khẩu cũ:
        <input type='text' name= 'MatKhau'/>
        Mật khẩu mới:
        <input type='text' name= 'MatKhauMoi'/>
        <input type='submit' name='sub' value='Đổi'>
</form>
";
    
    include_once("DataProvide_PDO.php");
    $kt= DataProvider_PDO::ExecuteQuery("SELECT TenDN,MatKhau FROM khachhang WHERE TenDN='$tendn'");
    $rs= $kt->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['sub'])){
        $matkhaucu=$_POST['MatKhau'];
        $matkhaumoi=$_POST['MatKhauMoi'];
        if($matkhaucu !=''||$matkhaumoi!=''){
        if($matkhaucu==$rs['MatKhau']){
            $sql=DataProvider_PDO::ExecuteQuery("UPDATE khachhang SET MatKhau='$matkhaumoi' WHERE TenDN='$tendn'");
            if(!empty($sql)){
                echo "Đổi mật khẩu thành công!";
            }        
        }
        else{
            echo "Mật khẩu củ không chính xác!";
        }
    }
    else{
        echo "Kiểm tra lại thông tin!";
    }
    }
?>
</body>
</html>