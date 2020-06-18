
<?php
include_once("../DataProvide_PDO.php");
$result = DataProvider_PDO::ExecuteQuery("SELECT * FROM khachhang");
echo "<table border='1' style='margin-left:250px'>
    <tr>
        <th>Tên đăng nhập</th>
        <th>Mật khẩu</th>
        <th>Họ tên</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Mã khách hàng</th>
    </tr>";
    while($tk=$result->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<th>$tk[TenDN]</th>";
        echo "<th>$tk[MatKhau]</th>";
        echo "<th>$tk[HoTen]</th>";
        echo "<th>$tk[DiaChi]</th>";
        echo "<th>$tk[DienThoai]</th>";
        echo "<th>$tk[Email]</th>";
        echo "<th>$tk[MaKH]</th>";
        echo "<th><a href='admin.php?page=themtk'>Thêm</a></th>";
        echo "<th><a href='suatk.php?page=suatk&&id=$tk[MaKH]'>Sữa</a></th>";
        echo "<th><a href='xoatk.php?id=$tk[MaKH]'>Xóa</a></th>";
    echo "</tr>";
    }
echo "</table>";
?>