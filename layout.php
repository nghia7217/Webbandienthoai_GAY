<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cửa hàng di động</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="js/jquery.min.js" ></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/layout.css"/>
  <link rel="stylesheet" href="css/HangHoa.css">
</head>
<body>
  
<div class="container">
    <div class="jumbotron text-center">
        <h1 id="test" >CỬA HÀNG DI ĐỘNG</h1>
  <marquee direction="right"><p >Uy tín tạo niềm tin!</p></marquee> 
  
</div>
    <div class="navbar navbar-inverse row">
            <ul class="nav navbar-nav" >
                <li><a href="layout.php">Trang chủ</a></li>
                <li><a href="layout.php?page=gioithieu">Giới thiệu</a></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="layout.php?id=1">Iphone</a></li>
                            <li><a href="layout.php?id=2">Nokia</a></li>
                            <li><a href="layout.php?id=3">Samsung</a></li>
                            <li><a href="layout.php?id=4">Xiaomi</a></li>
                            <li><a href="layout.php?id=5">Huawei</a></li>
                            <li><a href="layout.php?id=6">Sony</a></li>
                        </ul>
                    </li>
                <li><a href="layout.php?page=lienhe">Liên hệ</a></li>
                <li><a href="layout.php?page=hoidap">Hỏi đáp</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tài khoản <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="layout.php?page=dn">Đăng nhập</a></li>
                        <li><a href="layout.php?page=dk">Đăng ký thành viên</a></li>
                        <li class="divider"></li>
                        <li><a href="layout.php?page=dx">Đăng xuất</a></li>
                        <li><a href="layout.php?page=doimatkhau">Đổi mật khẩu</a></li>
                        <li><a href="layout.php?page=capnhathoso">Cập nhật hồ sơ</a></li>
                        <li class="divider"></li>
                        <li><a href="layout.php?page=dh">Đơn hàng</a></li>
                        <li><a href="layout.php?page=dhdd">Hàng đã mua</a></li>
                    </ul>
                </li>
                <li><a href="admin/admin.php"
                <?php
                    if(!empty($_SESSION['TenDN'])){
                        $tendn = $_SESSION['TenDN'];
                        if($tendn=='admin')echo "style='display:block'";
                        else echo "style='display:none'";
                    }
                    else echo "style='display:none'";
                ?>
                >Admin</a></li>
                <li> <a href="" style="margin-left:400px">
                <?php if(!empty($_SESSION['TenDN'])){
                    $tendn = $_SESSION['TenDN'];
                    echo "<div style='color:white'>Hello $tendn!</div>";}
                ?>
                </a>
                </li>
            </ul>
    </div>
     
    <div class="nn-sheet row">
    <aside class="col-md-3">
            
            
            <!--Nhà cung cấp-->
            <div class="panel panel-default">

                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <strong>Nhà cung cấp</strong>
                </div>

                <div class="list-group">
                    <a href="layout.php?id=1" class="list-group-item">Iphone</a>
                    <a href="layout.php?id=2" class="list-group-item">Nokia</a>
                    <a href="layout.php?id=3" class="list-group-item">Samsung</a>
                    <a href="layout.php?id=4" class="list-group-item">Xiaomi</a>
                    <a href="layout.php?id=5" class="list-group-item">Huawei</a>
                    <a href="layout.php?id=6" class="list-group-item">Sony</a>
                </div>
            </div>
            <!--/Nhà cung cấp-->

            <!--Gia Bán-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <strong>Giá bán</strong>
                </div>

                <div class="list-group">
                    <a href="layout.php?p=tang" class="list-group-item">Tăng theo giá</a>
                    <a href="layout.php?p=giam" class="list-group-item">Giảm theo giá</a>
                    <a href="layout.php?p=d2t" class="list-group-item">Dưới 2 triệu</a>
                    <a href="layout.php?p=2t5t" class="list-group-item">2 triệu - 5 triệu</a>
                    <a href="layout.php?p=5t10t" class="list-group-item">5 triệu - 10 triệu</a>
                    <a href="layout.php?p=t10t" class="list-group-item">Trên 10 triệu</a>
                </div>
            </div>
            <!--/Giá bán-->
        </aside>
<?php
    if(!isset($_GET['page'])){
            include 'menu/trangchu.php';
    }
    else{
            $page=$_GET['page'];
            switch($page){
                case 'gioithieu': include 'menu/gioithieu.php'; break;
                case 'lienhe': include 'menu/lienhe.php';break;
                case 'hoidap': include 'menu/webchat.php';break;
                case 'dn': include 'taikhoan/dangnhap.php'; break;
                case 'dx': include 'taikhoan/dangxuat.php';break;
                case 'dk':include 'taikhoan/dangki.php';break;
                case 'doimatkhau':include 'taikhoan/doimatkhau.php';break;
                case 'capnhathoso':include 'taikhoan/capnhathoso.php';break;
                case 'dh':include 'muahang/hoadon.php';break;
                case 'tt':include 'sanpham/thongtin.php';break;
                case 'xldh':include 'muahang/xldh.php';break;
                case 'dhdd':include 'muahang/dhdd.php';break;
            }
    }
?>
        
    </div>
    <footer class="row" style="text-align:center">
        <p>&copy; 2019</p>
    </footer>
</div>

</body>
</html>
