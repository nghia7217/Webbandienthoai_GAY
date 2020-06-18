<?php include("../DataProvider.php"); ?>
<form method="post" enctype="multipart/form-data" style="margin-left:500px">
	<h2>Cập nhật điện thoại</h2>
    <?php
    $madt=$_GET['id'];
    include_once("../DataProvide_PDO.php");
    $kt= DataProvider_PDO::ExecuteQuery("SELECT * FROM dienthoai WHERE MaDT='$madt'");
    $rs= $kt->fetch(PDO::FETCH_ASSOC);
    ?>
	<table>
        <tr>
			<td>Loại điện thoại</td>
			<td>
				<select name="cboLoaiDT">
				<?php
				$loaidt = DataProvider::ExecuteQuery("SELECT * FROM loaidt");
				while($lh = $loaidt->fetch_array())
				{
					echo "<option value='{$lh['MaLoai']}'>{$lh['TenLoai']}</option>";
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tên diện thoại:</td>
			<td><input name="txtTenDT" <?php echo "value='$rs[TenDT]'";?>/></td>
		</tr>
		<tr>
			<td>Giá bán:</td>
			<td><input name="txtGiaBan" type="number" min="0" <?php echo "value='$rs[GiaBan]'";?>/></td>
		</tr>
		<tr>
			<td>Thông tin:</td>
			<td><textarea name="txtThongTin" rows="5"><?php echo "$rs[ThongTin]"?></textarea></td>
		</tr>
        <?php echo "<th><img src='../dienthoai/{$rs['Hinh']}' style='width:150px; height:200px;'/></th>";?>
		<tr>
			<td>Hình:</td>
			<td><input type="file" name="fHinh"/></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button>Cập nhật</button><button type="reset">Làm lại</button> <button><a href="admin.php?page=qltk">Quay lại</a></button>
			</td>
		</tr>		
	</table>
</form>
<?php
if(isset($_FILES["fHinh"]))
{
	if($_FILES["fHinh"]["error"] == 0) //success : chuyển file lên TM tem thành công
	{
		if(move_uploaded_file($_FILES["fHinh"]["tmp_name"], 
			"../dienthoai/".$_FILES["fHinh"]["name"]))
			{
$sql = <<<EOD
UPDATE `dienthoai` SET `MaLoai`='{$_REQUEST["cboLoaiDT"]}',`TenDT`= '{$_REQUEST["txtTenDT"]}'
,`GiaBan`='{$_REQUEST["txtGiaBan"]}',`ThongTin`='{$_REQUEST["txtThongTin"]}',`Hinh`='{$_FILES["fHinh"]["name"]}'
WHERE MaDT='$madt';
EOD;
				//echo $sql;
                $data_dt = DataProvider::ExecuteQuery($sql);
                if(isset($data_dt)){
                    echo "Cập nhật thành công!";
                }
                else {
                    echo "Kiểm tra lại thông tin!";
                }
			}
	}
}
?>