<?php
    $id=$_GET['id'];
    include_once("../DataProvide_PDO.php");
    DataProvider_PDO::ExecuteQuery("DELETE FROM khachhang WHERE MaKH='$id'");
    echo "<script type='text/javascript'>window.location='admin.php?page=qltk';
    </script>";
?>