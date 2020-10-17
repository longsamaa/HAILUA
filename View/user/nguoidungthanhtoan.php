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
                <a href="nguoidungdangsanpham.php?id=<?php echo $Nguoidung->getID(); ?>" class="list-group-item">Đăng bán sản phẩm</a>
                <a href="sanphamnguoidung.php?id=<?php echo $Nguoidung->getID();?>" class="list-group-item">Sản phẩm của bạn</a>
                <a href="giaodichnguoidung.php?id=<?php echo $Nguoidung->getID();?>" class="list-group-item">Giao dịch</a>
                <a href="thongtintaikhoan.php?id=<?php echo $Nguoidung->getID();?>" class="list-group-item">Thông tin tài khoản</a>
                <a href="doimatkhau.php?id=<?php echo $Nguoidung->getID();?>" class="list-group-item">Đổi mật khẩu</a>
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
            <h1>Thanh toán</h1>
            <?php
                if(isset($_POST['thanhtoan'])) {
                    if ($bienNguoidung == 0) {
                        if (empty($_POST['hoten']) or empty($_POST['sodt'])) {
                            echo "<p style='color: red'>Làm ơn hãy nhập dầy đủ</p>";
                        } else {
                            $sql = mysqli_connect("localhost", "root", "", "hailua.com");
                            mysqli_set_charset($sql, "utf8");
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $itemsanpham[] = $key;
                            }
                            $str = implode(",", $itemsanpham);
                            $query = "SELECT * FROM hanghoa WHERE id IN ($str)";
                            $result = mysqli_query($sql, $query);
                            kt_query($result, $query, $sql);
                            $tongtien = 0;
                            while ($giohang = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                if (isset($_SESSION['cart'][$giohang['id']]) != 0) {
                                    $hotennguoimua = $_POST['hoten'];
                                    $sodtnguoimua = $_POST['sodt'];
                                    $idsanpham = $giohang['id'];
                                    $tensanpham = $giohang['tensanpham'];
                                    $soluong = $_SESSION['cart'][$giohang['id']];
                                    $thanhtien = $_SESSION['cart'][$giohang['id']] * $giohang['giasanpham'];
                                    $idnguoidung = $giohang['idnguoidung'];
                                    $idadmin = $giohang['idadminh'];
                                    if ($giohang['idadminh'] == 0) {
                                        $query2 = "INSERT INTO hoadon(idnguoidung,idsanpham,tennguoimua,sodienthoainguoimua,tensanpham,soluong,thanhtien)
                                                  VALUES ('$idnguoidung','$idsanpham','$hotennguoimua','$sodtnguoimua','$tensanpham','$soluong','$thanhtien')";
                                    } else {
                                        $query2 = "INSERT INTO hoadon(idadmin,idsanpham,tennguoimua,sodienthoainguoimua,tensanpham,soluong,thanhtien)
                                                  VALUES ('$idnguoidung','$idsanpham','$hotennguoimua','$sodtnguoimua','$tensanpham','$soluong','$thanhtien')";
                                    }
                                    $result2 = mysqli_query($sql, $query2);
                                    kt_query($result2, $query2, $sql);
                                    header('location:thanhtoanthanhcong.php');
                                }
                            }
                        }
                    } else {
                        $sql = mysqli_connect("localhost", "root", "", "hailua.com");
                        mysqli_set_charset($sql, "utf8");
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $itemsanpham[] = $key;
                        }
                        $str = implode(",", $itemsanpham);
                        $query = "SELECT * FROM hanghoa WHERE id IN ($str)";
                        $result = mysqli_query($sql, $query);
                        kt_query($result, $query, $sql);
                        $tongtien = 0;
                        while ($giohang = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            if (isset($_SESSION['cart'][$giohang['id']]) != 0) {
                                $hotennguoimua = $Nguoidung->gethoten();
                                $sodtnguoimua = $Nguoidung->getsodt();
                                $idsanpham = $giohang['id'];
                                $tensanpham = $giohang['tensanpham'];
                                $soluong = $_SESSION['cart'][$giohang['id']];
                                $thanhtien = $_SESSION['cart'][$giohang['id']] * $giohang['giasanpham'];
                                $idnguoidung = $giohang['idnguoidung'];
                                $idadmin = $giohang['idadminh'];
                                if ($giohang['idadminh'] == 0) {
                                    $query2 = "INSERT INTO hoadon(idnguoidung,idsanpham,tennguoimua,sodienthoainguoimua,tensanpham,soluong,thanhtien)
                                                                  VALUES ('$idnguoidung','$idsanpham','$hotennguoimua','$sodtnguoimua','$tensanpham','$soluong','$thanhtien')";
                                } else {
                                    $query2 = "INSERT INTO hoadon(idadmin,idsanpham,tennguoimua,sodienthoainguoimua,tensanpham,soluong,thanhtien)
                                                                  VALUES ('$idadmin','$idsanpham','$hotennguoimua','$sodtnguoimua','$tensanpham','$soluong','$thanhtien')";
                                }
                                $result2 = mysqli_query($sql, $query2);
                                kt_query($result2, $query2, $sql);
                                //Cap nhat so luong san pham da giao dich

                                $soluongsanphamgiaodich = loadsoluongsanphamgiaodich($idsanpham) + $soluong;
                                if(loadsoluongsanphamgiaodich($idsanpham) == 0) {
                                    $query3 = "INSERT INTO soluongsanphamgiaodich(idsanpham,soluongsanpham) VALUES ('$idsanpham','$soluongsanphamgiaodich')";
                                }
                                else{
                                    $query3 = "UPDATE soluongsanphamgiaodich 
                                                      SET soluongsanpham = '$soluongsanphamgiaodich' WHERE idsanpham = '$idsanpham'";
                                }
                                $result3 = mysqli_query($sql,$query3);
                                kt_query($result3,$query3,$sql);

                                header('location:thanhtoanthanhcong.php');
                            }

                        }
                    }
                }
            ?>
            <div class="col">
                <form method="post">
                <?php
                    if($bienNguoidung == 0){
                        ?>
                        <label class="card-title"><b>Họ tên</b></label>
                        <input type="text" name="hoten" class="form-control" placeholder="Họ tên">
                        <?php echo '</br>'; ?>
                        <label class="card-title"><b>Số điện thoại liên lạc</b></label>
                        <input type="text" name="sodt" class="form-control" placeholder="Số điện thoại">
                    <?php } ?>
                        <?php echo '</br>';?>
                        <label class="card-title"><b>Đơn hàng</b></label>
                    <table class="table table-hover">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Ảnh minh họa</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
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
                                    <td><?php echo $_SESSION['cart'][$giohang['id']]; ?></td>
                                    <td><?php echo $_SESSION['cart'][$giohang['id']] * $giohang['giasanpham']; ?>.000</td>
                                </tr>
                                <?php $tongtien += $_SESSION['cart'][$giohang['id']] * $giohang['giasanpham']; ?>
                                <?php
                            }
                        }
                        ?>
                        <tr><th> Tổng tiền : <?php echo $tongtien; ?>.000</th></tr>
                        <tr>
                            <th>
                                <input type="submit" name="thanhtoan" value="Thanh toán" class="btn-dark">
                            </th>
                        </tr>
                    </table>
                </form>

                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="business" value="tomna19982909-facilitator@gmail.com ">
                    <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
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
                    $tongtien1 = 0;
                    $soluong1 = 0;
                    $dem = 1;
                    while($giohang = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        if(isset($_SESSION['cart'][$giohang['id']]) != 0) {
                            if($giohang['idadminh'] != 0){
                                $tensanpham1 = $giohang['tensanpham'];
                                $tongtien1 += $_SESSION['cart'][$giohang['id']] * $giohang['giasanpham']; ?>
                                <input type="hidden" value="<?php echo $tensanpham1; ?>" name="item_name_<?php echo $dem;?>">
                                <input type="hidden" value="<?php echo $tongtien1/20 ;?>" name="amount_<?php echo $dem; ?>">
                                <input type="hidden" value="<?php echo $_SESSION['cart'][$giohang['id']];?>" name="quantity_<?php echo $dem; ?>">
                    <?php      $dem++;   }
                        }
                    } ?>

                </form>
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

