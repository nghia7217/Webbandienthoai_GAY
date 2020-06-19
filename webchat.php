<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang ="fr" lang="fr" >
    <head>
        <title>Mini-chat</title>
        <meta  http-equiv=" Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
<?php
if (isset($_POST['nickname']) AND isset($_POST['message'])) 
{
if ($_POST['nickname'] != NULL AND $_POST['message'] != NULL) 
{
// Trước hết, đăng nhập vào MySQL
include_once("DataProvide_PDO.php");

$nickname=$_POST['nickname'];
$message=$_POST['message'];
DataProvider_PDO::ExecuteQuery("INSERT INTO minichat VALUES('', '$nickname', '$message')");
}
}
?>
        <strong><h3 style="margin-left:450px; font-size:50px">Hỏi đáp</h3></strong>
<table border="1" style="width:500px; margin-left:400px;">
<form action="layout.php?page=hoidap" method= "post">
    <?php
    if(isset($_SESSION['TenDN'])){
        $tendn=$_SESSION['TenDN'];
    echo "<tr >";
        echo "<td style='width:80px'>Nickname : </td>";
        echo "<td><input type='text' name= 'nickname' style='width:420px' value='$tendn'></td>";
    echo "</tr>";
    }
    else{
        echo "<tr >";
        echo "<td style='width:80px'>Nickname : </td>";
        echo "<td><input type='text' name= 'nickname' style='width:420px'/></td>";
        echo "</tr>";
    }
    ?>
    <tr>
        <td>Message : </td>
        <td><input type="text" name= "message" style="width:420px"/></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Gửi"></td>
    </tr>
</form>
<tr><td colspan="2">
<?php
//Cho hiển thị 10 nội dung mới nhất
include_once("DataProvide_PDO.php");
$result = DataProvider_PDO::ExecuteQuery("SELECT * FROM minichat ORDER BY id DESC LIMIT 0,10");
while ($chat = $result->fetch() )
{
?>
<p><strong><?php echo $chat['nickname']; ?> </strong> : <?php echo $chat['message']; ?>

</p>
<?php
}
// Xong
?>
</td></tr>
</table>
    </body>
</html>