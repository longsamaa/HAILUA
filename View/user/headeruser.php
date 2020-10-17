
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chào mừng bạn đến với HAILUA.COM</title>

    <!-- Bootstrap core CSS -->
    <link href="../Userpublic/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Userpublic/css/shop-homepage.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>

<body>
<!-- Navigation -->
<?php
    require "C:/xampp/htdocs/Hailua/Model/functionMODEL.php";
?>
<?php
//Nhận cookie
@ob_start();
session_start();
?>
<?php
    $bienNguoidung = 0;
    if(isset($_SESSION['taikhoannguoidung']) && isset($_SESSION['matkhaunguoidung'])){
        $taikhoan = $_SESSION['taikhoannguoidung'];
        $matkhau = $_SESSION['matkhaunguoidung'];
        $Nguoidung = setClassnguoidung($taikhoan,$matkhau);
        $bienNguoidung = 1;
    }
    else {
        $bienNguoidung = 0;
    }
?>
<?php
    if($bienNguoidung != 0) {
        $idkhoa = $Nguoidung->getID();
        $khoataikhoan = loadtaikhoankhoaID($idkhoa);
        $num = mysqli_num_rows($khoataikhoan);
        if ($num > 0) {
            unset($_SESSION['taikhoannguoidung']);
            unset($_SESSION['matkhaunguoidung']);
            ?>

            <script>
                alert("Tài khoản bạn đã bị khóa rồi ahihi :)))");
                window.location.reload();
            </script>

        <?php }
    }
    ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">HAILUA.COM xin chào <?php if($bienNguoidung != 0) {echo $Nguoidung->gethoten();} ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="indexuser.php">Trang chủ
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php if( isset($bienNguoidung) && $bienNguoidung == 0) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="dangky.php">Đăng ký</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dangnhap.php">Đăng nhập</a>
                </li>
                <?php } ?>
                <?php
                    if(isset($bienNguoidung) && $bienNguoidung != 0) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dangxuat.php">Đăng xuất</a>
                        </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="giohang.php">Giỏ hàng (<?php $ok = 1; if (isset($_SESSION['cart'])){
                            foreach ($_SESSION['cart'] as $k => $v){
                                if(isset($k)){
                                    $ok = 2;
                                }
                            }
                            if($ok != 2 ){
                                echo "0";
                            }
                            else{
                                $item = $_SESSION['cart'];
                                echo count($item);
                            }
                        }?> )</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gioithieutrangweb.php">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <div id = "serch" class="form-group">
                        <form name = "frmsearch" method="GET">
<!--                            <input type="text" name = "ten" placeholder="Tìm kiếm sản phẩm" id="timkiemsanpham" />-->
<!--                            <div id = "listtimkiem"></div>-->
<!--                            <input type="submit" name="timkiem" value="Tìm kiếm" />-->
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
