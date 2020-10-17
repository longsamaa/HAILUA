
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập HAILUA.COM</title>

    <!-- Bootstrap core CSS-->
    <link href="/Hailua/Public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="/Hailua/Public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/Hailua/Public/admin/css/sb-admin.css" rel="stylesheet">

</head>

<?php
    require "C:/xampp/htdocs/Hailua/Model/functionMODEL.php";
?>


<body class="bg-dark">

<div class="container">
    <div class="row">
        <img src="../hinhanhweb/anhnen3.jpg" width="800px" height="800px">
    <div class="card card-login mx-auto mt-0">
        <div class="card-header">Đăng nhập HAILUA.COM</div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="inputEmail" class="form-control" placeholder="Tài khoản" required="required" autofocus="autofocus" name="taikhoan">
                        <label for="inputEmail">Tải khoản</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required="required" name="matkhau">
                        <label for="inputPassword">Mật khẩu</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Ghi nhớ mật khẩu
                        </label>
                    </div>
                    <?php
                        $data = loadtaikhoannguoidung();
                        if(isset($_POST['dangnhap'])){
                            if(isset($_POST['taikhoan']) && isset($_POST['matkhau'])){
                                $taikhoan = $_POST['taikhoan'];
                                $matkhau = $_POST['matkhau'];
                                $data = loadtaikhoannguoidungUsername($taikhoan,$matkhau);
                                $num = mysqli_num_rows($data);
                                if($num == 0){
                                    echo '<p style="color: red">Tài khoản hoặc mật khẩu không đúng</p>';
                                }
                                else{
                                    session_start();
                                    $_SESSION['taikhoannguoidung'] = $taikhoan;
                                    $_SESSION['matkhaunguoidung'] = $matkhau;
                                    header('location:indexuser.php');
                                }
                            }
                        }
                    ?>
                </div>
                <input type="submit" name="dangnhap" value="Đăng nhập" class="btn-dark">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="dangky.php">Tạo tài khoản</a>
                <a class="d-block small" href="forgot-password.html">Quên mật khẩu?</a>
            </div>
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
