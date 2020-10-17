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
//            $slide1 = loadImageslide(1);
//            $slide2 = loadImageslide(2);
//            $slide3 = loadImageslide(3);
//            ?>
<!--            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">-->
<!--                <ol class="carousel-indicators">-->
<!--                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
<!--                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
<!--                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
<!--                </ol>-->
<!--                <div class="carousel-inner" role="listbox">-->
<!--                    <div class="carousel-item active">-->
<!--                        <img class="d-block img-fluid" src="--><?php //echo $slide1['hinhanh'];?><!--" width="900px" height="350px">-->
<!--                    </div>-->
<!--                    <div class="carousel-item">-->
<!--                        <img class="d-block img-fluid" src="--><?php //echo $slide2['hinhanh'];?><!--" alt="Second slide" width="900px" height="350px">-->
<!--                    </div>-->
<!--                    <div class="carousel-item">-->
<!--                        <img class="d-block img-fluid" src="--><?php //echo $slide3['hinhanh'];?><!--" alt="Third slide"  height="350px" width="900px">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">-->
<!--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                    <span class="sr-only">Previous</span>-->
<!--                </a>-->
<!--                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">-->
<!--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                    <span class="sr-only">Next</span>-->
<!--                </a>-->
<!--            </div>-->
            <h1>Giới thiệu HAILUA.COM</h1>
            <div class="row">
            <p>
                Kính thưa Quý khách hàng!

                Trước hết, Công ty TNHH Thương mại NONAME xin gửi đến Quý Khách hàng lời chúc sức khỏe và lời chào trân trọng nhất! <br>

                HAILUA.COM là cửa hàng thực phẩm sạch trực thuộc Công ty TNHH Thương Mại NONAME Lực chuyên cung cấp các mặt hàng rau củ quả, trái cây tươi, thực phẩm tươi sống cùng các loại gia vị phụ gia cho các hộ gia đình, nhà hàng, khách sạn, bệnh viện, trường học, bếp ăn công nghiệp trong TP. Hồ Chí Minh và các Tỉnh lân cận. Bên cạnh đó để đáp ứng nhu cầu thưởng thức hương vị quê hương của Quý khách hàng Csfood còn cung cấp những đặc sản ngon, chất lượng, nổi tiếng nhất trên các vùng miền và các sản phẩm chứng nhận VietGap của các hợp tác xã tại TP. Hồ Chí Minh.

                Csfood sẽ là nơi đáp ứng đầy đủ mọi nhu cầu của khách hàng về đa dạng sản phẩm, chất lượng và giá cả hợp lý. Csfood sẽ luôn cố gắng nổ lực sáng tạo để không ngừng nâng cao chất lượng sản phẩm để đáp lại sự tin cậy của Quý khách hàng. Nhằm nâng cao chất lượng sản phẩm và chất lượng phục vụ ngày càng tốt hơn, Csfood rất mong được sự ủng hộ và nhận ý kiến đóng góp từ phía Quý khách hàng.

                Rất mong nhận được sự quan tâm hợp tác của Quý khách hàng. <br>

                CỬA HÀNG THỰC PHẨM SẠCH HAILUA.COM <br>
                Địa Chỉ : 34Q Đường 43B , Phường 10 , Quận 6, TP Hồ Chí Minh , Việt Nam <br>
                Điện thoại: (08) 62931769 <br>
                Fax : (08) 62931769 <br>
                Email: csfood2010@gmail.com <br>
                Website: http://csfood.vn <br>

                HAILUA.COM <br>
                Address: 34Q, 43B Street, 10 Ward, District 6, Ho Chi Minh City, Viet Nam <br>
                Phone: (08) 62931769 <br>
                Fax: (08) 62931769 <br>
                Email: csfood2010@gmail.com <br>
                Website: http://HAILUA.COM <br>
                <p style="color: blue">Website được thực hiện bởi nhóm 7 NONAME</p><br>
            </p>

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

