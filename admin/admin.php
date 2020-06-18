<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/jquery.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Trang Admin</title>
</head>
<body style="background:#CCFFCC; text-align:center">
    <h1 >TRANG QUẢN LÝ</h1>
    <div>
    <button><a href='../layout.php'>Trang chủ</a></button> 
    <button><a href='admin.php?page=qltk'>Quản lý tài khoản</a></button> 
    <button><a href='admin.php?page=qldt'>Quản lý điện thoại</a></button>
    <button><a href='admin.php?page=qlhd'>Quản lý hóa đơn</a></button>
    </div>
    <?php
    if(isset($_GET['page'])){
            $page=$_GET['page'];
            switch($page){
                case 'qltk': include '../admin/quanlytaikhoan.php'; break;
                case 'qldt': include '../admin/quanlydienthoai.php';break;
                case 'qlhd': include '../admin/quanlyhoadon.php';break;
                case 'themdt':include '../admin/themdt.php';break;
                case 'themhd':include '../admin/themhd.php';break;
                case 'themtk':include '../admin/themtk.php';break;
                case 'xoadt':include '../admin/xoadt.php';break;
                case 'xoahd':include '../admin/xoadh.php';break;
                case 'suadt':include '../admin/suadt.php';break;
                case 'suahd':include '../admin/suahd.php';break;
                case 'huyhd':include '../admin/huyhd.php';break;
            }
    }
?>
</body>
</html>