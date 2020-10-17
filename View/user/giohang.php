<?php require_once __DIR__."/headeruser.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">HAILUA.COM</h1>
            <img src="../hinhanhweb/farmersmarketLT.png" width="300px" height="300px">
            <h4>Tìm kiếm</h4>
            <form name = "frmsearch" method="GET">
                <input type="text" name = "ten" placeholder="Tìm kiếm sản phẩm" id="timkiemsanpham" />
                <div id = "listtimkiem" class="form-group"></div>
                <!--                            <input type="submit" name="timkiem" value="Tìm kiếm" />-->
            </form>
            <?php echo '</br>'; ?>
            <h4 class="card-title">Loại sản phẩm</h4>
            <?php
            $data1 = loadLoaisanpham();
            while($loaisanpham = mysqli_fetch_array($data1,MYSQLI_ASSOC)){
                ?>
                <div class="list-group">
                    <a href="Danhsachsanpham.php?id=<?php echo $loaisanpham['id'] ?>" class="list-group-item"><?php echo $loaisanpham['loaisanpham']; ?></a>
                </div>
            <?php } ?>
            <?php echo "</br>"; ?>
            <?php
            if($bienNguoidung != 0){
                ?>
                <h4 class="card-title">Tài khoản người dùng</h4>
                <div class="list-group">
                    <a href="nguoidungdangsanpham.php?id=<?php echo $Nguoidung->getID(); ?>" class="list-group-item">Đăng bán sản phẩm</a>
                    <a href="sanphamnguoidung.php?id=<?php echo $Nguoidung->getID();?>" class="list-group-item">Sản phẩm của bạn</a>
                    <a href="giaodichnguoidung.php?id=<?php echo $Nguoidung->getID();?>" class="list-group-item">Giao dịch</a>
                    <a href="thongtintaikhoan.php?id=<?php echo $Nguoidung->getID();?>" class="list-group-item">Thông tin tài khoản</a>
                    <a href="doimatkhau.php?id=<?php echo $Nguoidung->getID();?>" class="list-group-item">Đổi mật khẩu</a>
                </div>
            <?php } ?>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <!---->     <?php
            $slide1 = loadImageslide(1);
            $slide2 = loadImageslide(2);
            $slide3 = loadImageslide(3);
            ?>
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="<?php echo $slide1['hinhanh'];?>" width="900px" height="350px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="<?php echo $slide2['hinhanh'];?>" alt="Second slide" width="900px" height="350px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="<?php echo $slide3['hinhanh'];?>" alt="Third slide"  height="350px" width="900px">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-title">
                <h1>Giỏ hàng</h1>
            </div>
            <?php
                if(isset($_POST['submit3'])){
                    header('location:indexuser.php');
                }
                if(isset($_POST['submit'])){
                    foreach ($_POST['qty'] as $key => $value){
                        if(($value == 0) and (is_numeric($value))){
                            unset($_SESSION['cart'][$key]);
                        }
                        else{
                            if(($value > 0) and (is_numeric($value))){
                                $_SESSION['cart'][$key] = $value;
                            }
                        }
                    }
                    header("location:giohang.php");
                }
                if(isset($_POST['submit2'])){
                    $k = 2;
                    header('location:nguoidungthanhtoan.php');
                }
            ?>
            <div class="row">
               <?php
                    $ok = 1;
                    if(isset($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $k => $v){
                            if(isset($k)){
                                $ok = 2;
                            }
                        }
                    }
                    if($ok != 2){
                        echo "<p>Bạn không có sản phẩm nào trong giỏ cả</p>";
                    }
                    else {
                        ?>
                            <form method="post" action="giohang.php">
                                <div id = "sanphamtronggio">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Ảnh minh họa</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Xóa</th>
                                        </tr>
                                        <?php
                                            $sql = mysqli_connect("localhost","root","","hailua.com");
                                            mysqli_set_charset($sql,"utf8");
                                            foreach ($_SESSION['cart'] as $key => $value){
                                                $itemsanpham[] = $key;
                                            }
                                            $str = implode(",",$itemsanpham);
                                            $query = "SELECT * FROM hanghoa WHERE id IN ($str)";
                                            $result = mysqli_query($sql,$query);
                                            kt_query($result,$query,$sql);
                                            $tongtien = 0;
                                            while($giohang = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                if(isset($_SESSION['cart'][$giohang['id']]) != 0) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $giohang['tensanpham']; ?></td>
                                                        <td><?php echo $giohang['giasanpham'] ?></td>
                                                        <td><img src="<?php echo $giohang['anhminhhoa']; ?>"
                                                                 width="30px" height="30px" class="img-thumbnail"></td>
                                                        <td><?php echo $giohang['giasanpham'] ?> vnđ</td>
                                                        <td><input type="text" name="qty[<?php echo $giohang['id'] ?>]"
                                                                   size="5"
                                                                   value="<?php echo $_SESSION['cart'][$giohang['id']]; ?>">
                                                        </td>
                                                        <td><?php echo $_SESSION['cart'][$giohang['id']] * $giohang['giasanpham']; ?>
                                                            .000
                                                        </td>
                                                        <td><a href="xoatronggiohang.php?id=<?php echo $giohang['id']; ?>"><img src="../hinhanhweb/iconxoa.png"
                                                                             width="30px" height="30px"
                                                                             class="img-thumbnail"></a></td>
                                                    </tr>
                                                    <?php $tongtien += $_SESSION['cart'][$giohang['id']] * $giohang['giasanpham']; ?>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="2" class="card-title">Tổng tiền : <?php echo $tongtien; ?>.000 </td>
                                            <td colspan="2"> <input type="submit" name = "submit" value = "Cập nhật giỏ hàng" class="btn-dark"> </td>
                                            <?php if($ok == 2) { ?>
                                            <td colspan="2"><input type="submit" name = "submit2"value="Thanh toán" class="btn-dark"></td>
                                            <td colspan="2"><input type="submit" name = "submit3"value="Mua tiếp" class="btn-dark"></td>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                </div>
                            </form>

                    <?php } ?>


            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#timkiemsanpham').keyup(function () {
                var query = $(this).val();
                if(query != ""){
                    $.ajax({
                        url:"ajax.php",
                        method:"POST",
                        data:{query:query},
                        success:function (data) {
                            $('#listtimkiem').fadeIn();
                            $('#listtimkiem').html(data);
                        }
                    });
                }
                else
                {
                    $('#listtimkiem').fadeOut();
                }
            })
        })
    </script>
    <?php  require_once  __DIR__."/footeruser.php"?>

