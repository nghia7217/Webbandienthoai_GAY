<?php include("../DataProvider.php"); ?>
<form method="post" enctype="multipart/form-data" style="margin-left:500px">
	<h2 style="margin-left:-500px">Thêm điện thoại</h2>
	<table>
		<tr>
			<td>Loại hoa</td>
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
			<td><input name="txtTenDT" /></td>
		</tr>
		<tr>
			<td>Giá bán:</td>
			<td><input name="txtGiaBan" type="number" min="0" /></td>
		</tr>
		<tr>
			<td>Thông tin:</td>
			<td><textarea name="txtThongTin" rows="5"></textarea></td>
		</tr>
		<tr>
			<td>Hình:</td>
			<td><input type="file" name="fHinh" /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button>Thêm</button><button type="reset">Làm lại</button>
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
INSERT INTO `dienthoai` (`MaLoai`, `TenDT`, `GiaBan`, `ThongTin`, `Hinh`) 
VALUES ('{$_REQUEST["cboLoaiDT"]}', '{$_REQUEST["txtTenDT"]}', 
'{$_REQUEST["txtGiaBan"]}', '{$_REQUEST["txtThongTin"]}', '{$_FILES["fHinh"]["name"]}');
EOD;
				//echo $sql;
                $data_dt = DataProvider::ExecuteQuery($sql);
                if(isset($data_dt)){
                    echo "Thêm thành công!";
                }
                else {
                    echo "Kiểm tra lại thông tin!";
                }
			}
	}
}
?>