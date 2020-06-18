
    <?php
        $mahd=$_GET['id'];
        include_once("../DataProvide_PDO.php");
        $kt= DataProvider_PDO::ExecuteQuery("UPDATE hoadon SET TinhTrang='Đã xác nhận' where MaHD='$mahd'");
        echo "<script type='text/javascript'>window.location='admin.php?page=qlhd';
    </script>";
    ?>
    