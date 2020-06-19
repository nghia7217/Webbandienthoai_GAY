<?php 
    include_once("DataProvide_PDO.php");
    $result = DataProvider_PDO::ExecuteQuery("SELECT * FROM khachhang");
    echo "<h1>Thông tin về Cửa hàng di dộng</h1>";
    echo "<h3 style='color:blue'>Bán các sản phẩm điện thoại uy tín!</h3>";
    echo "<h3 >Nhân viên:</h3>";
    while($khachhang = $result->fetch())
    {
    $data = <<<EOD
            <div style='color:blue'>{$khachhang["HoTen"]}</div>
EOD;
            echo $data;
        }

?>