
<?php
include_once("../DataProvide_PDO.php");
$result = DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai");
echo "<table border='1' style='margin-left:370px'>
    <tr>
        <th>Mã điện thoại</th>
        <th>Mã loại</th>
        <th>Tên điện thoại</th>
        <th>Giá bán</th>
        <th>Hình</th>
    </tr>";
    while($dt=$result->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<th>$dt[MaDT]</th>";
        echo "<th>$dt[MaLoai]</th>";
        echo "<th>$dt[TenDT]</th>";
        echo "<th>$dt[GiaBan]</th>";
        echo "<th>$dt[ThongTin]</th>";
        echo "<th><img src='../dienthoai/{$dt['Hinh']}' style='width:150px; height:200px;'/></th>";
        echo "<th><a href='admin.php?page=themdt'>Thêm</a></th>";
        echo "<th><a href='suadt.php?page=suadt&&id=$dt[MaDT]'>Sữa</a></th>";
        echo "<th><a href='xoadt.php?id=$dt[MaDT]'>Xóa</a></th>";
    echo "</tr>";
    }
echo "</table>";
?>