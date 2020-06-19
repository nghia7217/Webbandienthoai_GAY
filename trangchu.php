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
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result = DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai WHERE MaLoai=$id");
    }
    else{
        $result = DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai ");
    }
if(isset($_GET['p'])){
    $p=$_GET['p'];
    switch($p){
        case 'tang': $result= DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai ORDER BY Giaban");break;
        case 'giam': $result= DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai ORDER BY Giaban DESC");break;
        case 'd2t': $result= DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai where Giaban<2000000");break;
        case '2t5t': $result= DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai where Giaban>2000000 and Giaban<5000000");break;
        case '5t10t': $result= DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai where Giaban>5000000 and Giaban<10000000");break;
        case 't10t': $result= DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai where Giaban>10000000");break;
    
    }
}
while($dienthoai = $result->fetch())
{
    $gia=adddotstring($dienthoai['GiaBan']);
echo "<a href='layout.php?page=tt&id=$dienthoai[MaDT]'><div class='hanghoa'>";
    echo "<img src='./dienthoai/{$dienthoai['Hinh']}' class='hinh' />";
    echo "<div class='giaban'>$gia</div>";
    echo "<img src='./images/icon-new.png' class='iconnew' />";
    echo "<div class='ten'>{$dienthoai['TenDT']}</div>";
    echo "<div class='giasoc'></div>";
echo "</div></a>";
}
    echo "</article>";
?>