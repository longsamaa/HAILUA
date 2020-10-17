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
            <h1>Sản phẩm nổi bật</h1>
            <div class="row">
                <?php
                $result = loadsoluongsanpham();
                $dem = 1;
                while($soluongsanphamgiaodich = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $idsanpham = $soluongsanphamgiaodich['idsanpham'];
                $sanpham = loadhanghoaID($idsanpham);
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="trangchitietsanpham.php?id=<?php echo $sanpham['id'] ?>" class="sanpham_img_id1<?php echo $sanpham['id'];?>" id2="<?php echo $sanpham['id'];?>"><img class="card-img-top" src="<?php echo $sanpham['anhminhhoa']; ?>" alt="" width="200px" height="200px"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="trangchitietsanpham.php?id=<?php echo $sanpham['id']; ?>"><?php echo $sanpham['tensanpham']; ?></a>
                            </h4>
                            <h4> <p style="color: red">HOT</p></h4>
                            <h5><?php echo $sanpham['giasanpham'] ?> vnđ</h5>
                            <p class="card-text">Sản phẩm bán rất chạy</p>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            <?php
            if($dem == 3){break;}else{$dem++;}
                }
                ?>
            </div>
            <h1>Danh sách sản phẩm</h1>
            <div class="row">
                <?php
                        if(isset($bienNguoidung) && $bienNguoidung != 0){
                            $tmp1 = $Nguoidung->getID();
                            $data2 = loadhanghoangoaitru($tmp1);
                        }else {
                            $data2 = Loadhanghoa();
                        }
                        while($hanghoa = mysqli_fetch_array($data2,MYSQLI_ASSOC)){
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="trangchitietsanpham.php?id=<?php echo $hanghoa['id'] ?>" class="sanpham_img_id<?php echo $hanghoa['id'];?>" id="<?php echo $hanghoa['id'];?>"><img class="card-img-top" src="<?php echo $hanghoa['anhminhhoa']; ?>" alt="" width="200px" height="200px"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="trangchitietsanpham.php?id=<?php echo $hanghoa['id']; ?>"><?php echo $hanghoa['tensanpham']; ?></a>
                            </h4>
                            <h5><?php echo $hanghoa['giasanpham'] ?> vnđ</h5>
                            <p class="card-text">Chưa có mô tả</p>
                            <a  id="addcart<?php echo $hanghoa['id']; ?>"><input type="submit" value="Thêm vào giỏ" class="btn btn-dark"></a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#addcart<?php echo $hanghoa['id']; ?>").click(function () {
                                        var id = $(".sanpham_img_id<?php echo $hanghoa['id'];?>").attr('id');
                                        $.ajax({
                                           type: "POST",
                                            url: "themvaogiohang.php",
                                            data: {id : id},
                                            cache: false,
                                            success:function (results) {
                                                alert("Sản phẩm đã được thêm vào trong giỏ hàng");
                                                window.location.reload();
                                            }
                                        });
                                    });
                                });
                            </script>
                <?php } ?>
<!--

            </div>
            <!-- /.row -->

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

