
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng Nhập Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="/Hailua/Public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="/Hailua/Public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/Hailua/Public/admin/css/sb-admin.css" rel="stylesheet">

</head>
<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="inputEmail" name="taikhoan" class="form-control" placeholder="Tài Khoản" required="required" autofocus="autofocus">
                        <label for="inputEmail">Tài Khoản</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" name="matkhau" class="form-control" placeholder="Mật Khẩu" required="required">
                        <label for="inputPassword">Mật Khẩu</label>

                        <?php
                            require "C:/xampp/htdocs/Hailua/Model/functionMODEL.php";
                            $sql = mysqli_connect("localhost","root","","hailua.com");
                            mysqli_set_charset($sql,"utf8");
                            if(isset($_POST['dangnhap'])){
                                if(empty($_POST['taikhoan']) or empty($_POST['matkhau'])) {
                                    echo '<p style="color: red">Vui lòng không để khoản trống</p>';
                                }
                                else
                                {
                                    $taikhoan = $_POST['taikhoan'];
                                    $matkhau = $_POST['matkhau'];
                                    $data = loadDBUSERNAME($taikhoan,$matkhau);
                                    $num = mysqli_num_rows($data);
                                    if($num == 0){
                                        echo '<p style="color: red">Tài khoản hoặc mật khẩu không đúng</p>';
                                    }
                                    else{
                                        session_start();
                                        $_SESSION['taikhoanadmin'] = $taikhoan;
                                        $_SESSION['matkhauadmin'] = $matkhau;
                                        header('location:index.php');
                                    }
                                }
                            }
                        ?>

                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Ghi Nhớ Tài Khoản
                        </label>
                    </div>
                </div>
                <a class="bntdangnhap">
                 <input type = "submit" name = "dangnhap" value = "Đăng nhập" class="bntDangnhap"/>
                </a>
<!--                <a class="btn btn-primary btn-block" name = "dangnhap">Đăng nhập</a>-->
            </form>
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
