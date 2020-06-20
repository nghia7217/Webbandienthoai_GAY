<?php
    include_once("DataProvide_PDO.php");
    $tt=$_GET['tongtien'];
    $mahd=$_GET['id'];
    $makh=$_SESSION['MaKH'];
    $ngaydat=date('Y-m-d H:i:s');
    DataProvider_PDO::ExecuteQuery("UPDATE hoadon SET NgayDat='$ngaydat',TinhTrang='Đã đặt',TongTien='$tt' where MaHD=$mahd and MaKH=$makh");
    echo "<script> window.location = 'layout.php?page=dhdd'; </script>";
?>