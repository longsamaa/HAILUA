
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tạo tài khoản HAILUA.COM</title>

    <!-- Bootstrap core CSS-->
    <link href="/Hailua/Public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="/Hailua/Public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/Hailua/Public/admin/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php
    require "C:/xampp/htdocs/Hailua/Model/functionMODEL.php";
?>


<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Tạo tài khoản HAILUA.COM</div>
        <div class="card-body">
            <form method = post>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">

                                <input type="text" id="firstName" class="form-control" placeholder="Họ tên" required="required" autofocus="autofocus" name = "hoten">
                                <label for="firstName">Họ tên</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="lastName" class="form-control" placeholder="Số điện thoại" required="required" name="sodt">
                                <label for="lastName">Số điện thoại</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="inputEmail" class="form-control" placeholder="Tên đăng nhập" required="required" name="tendangnhap">
                        <label for="inputEmail">Tên đăng nhập</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required="required" name="matkhau">
                                <label for="inputPassword">Mật khẩu</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" id="confirmPassword" class="form-control" placeholder="Nhập lại mật khẩu" required="required" name="nhaplaimatkhau">
                                <label for="confirmPassword">Nhập lại mật khẩu</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto">
                    <input type="submit" name="taotaikhoan" value="Tạo tài khoản" class="btn-dark">
                    <?php
                    $data = loadtaikhoannguoidung();
                    if(isset($_POST['taotaikhoan'])){
                        if(isset($_POST['hoten']) && isset($_POST['tendangnhap']) && isset($_POST['matkhau']) && isset($_POST['nhaplaimatkhau']) && isset($_POST['sodt'])){
                            $hoten = $_POST['hoten'];
                            $tmp = 0;
                            $tendangnhap = $_POST['tendangnhap'];
                            $matkhau = $_POST['matkhau'];
                            $nhaplaimatkhau = $_POST['nhaplaimatkhau'];
                            $sodt = $_POST['sodt'];
                            while ($rs = mysqli_fetch_array($data,MYSQLI_ASSOC)){
                                if($tendangnhap == $rs['taikhoan']){
                                    $tmp = $tmp + 1;
                                }
                            }
                            if($tmp != 0){
                                echo "<p style='color: red'>Tên tài khoản này đã có người sử dụng rồi</p>";
                                $tmp = 0;
                            }
                            else{
                                if($matkhau != $nhaplaimatkhau){
                                    echo "<p style='color: red'>Mật khẩu nhập lại không khớp</p>";
                                }
                                else{
                                    $sql = mysqli_connect("localhost","root","","hailua.com");
                                    mysqli_set_charset($sql,"utf8");
                                    $query = "INSERT INTO nguoidung(taikhoan,matkhau,hoten,sodienthoai)
                                              VALUES ('$tendangnhap','$matkhau','$hoten','$sodt')";
                                    $result = mysqli_query($sql,$query);
                                    kt_query($result,$query,$sql);
                                    header('location:dangnhap.php');
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="dangnhap.php">Đăng nhập trang web</a>
                <a class="d-block small" href="forgot-password.html">Quên mật khẩu</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/Hailua/Public/admin/vendor/jquery/jquery.min.js"></script>
<script src="/Hailua/Public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/Hailua/Public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
