<?php 
function adddotstring($strNum) {
 
 $len = strlen($strNum);
 $counter = 3;
 $result = "";
 while ($len - $counter >= 0)
 {
     $con = substr($strNum, $len - $counter , 3);
     $result = '.'.$con.$result;
     $counter+= 3;
 }
 $con = substr($strNum, 0 , 3 - ($counter - $len) );
 $result = $con.$result;
 if(substr($result,0,1)=='.'){
     $result=substr($result,1,$len+1);   
 }
 return $result;
}
?>
<?php
    echo "<article class='col-md-9'>";
    include_once("DataProvide_PDO.php");
    $makh=$_SESSION['MaKH'];
    $rs=DataProvider_PDO::ExecuteQuery("SELECT *FROM hoadon where MaKH='$makh' and TinhTrang!='Chờ đặt'");
    while($result=$rs->fetch(PDO::FETCH_ASSOC)){
    $sql = DataProvider_PDO::ExecuteQuery("SELECT *FROM dienthoai where MaDT='$result[MaDT]'");
    $dienthoai= $sql->fetch(PDO::FETCH_ASSOC);
        $gia=adddotstring($dienthoai['GiaBan']);
        echo "<div class='hanghoa' style='width:600px; height:200px'>";
        echo "<div style='margin-top:-15px'><h1>{$dienthoai['TenDT']}</h1></div>";
        echo "<img src='dienthoai/{$dienthoai['Hinh']}' class='hinh' style='margin-right:500px; height:150px; margin-top:-50px'/>";
        echo "<div class='giaban'>Giá bán :$gia</div>";
        echo "<div style='margin-top:-100px'>Số lượng: $result[SoLuong]</div>";
        $tongtien=$dienthoai['GiaBan']*$result['SoLuong'];
        $tt=adddotstring($tongtien);
        echo "<div name ='MaDT' value='$dienthoai[MaDT]'>Tổng tiền: $tt</div>";
        echo "<div>Tinh trạng:$result[TinhTrang]</div>";
        echo "</div>";
    }
    echo "</article>";
?>
