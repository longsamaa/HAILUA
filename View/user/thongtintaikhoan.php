<?php require_once __DIR__."/headeruser.php" ?>

<!-- Page Content -->
<?php
if($bienNguoidung == 0){
    header('location:indexuser.php');
}
?>
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
            <?php
            if(isset($_GET['id'])){
                $idnguoidung = $_GET['id'];
            }
            $idnguoidung = $Nguoidung->getID();
            $thongtin = loadtaikhoannguoidungID($idnguoidung);
            ?>
            <h1>Thông tin tài khoản</h1>
            <div class="row">
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã tài khoản</th>
                        <th><?php echo $thongtin['id']; ?></th>
                    </tr>
                    <tr>
                        <th>Họ tên:</th>
                        <th><?php echo $thongtin['hoten']; ?></th>
                    </tr>
                    <tr>
                        <th>Số điện thoại :</th>
                        <th><?php echo $thongtin['sodienthoai']; ?></th>
                    </tr>
                    <tr>
                        <th>Mật khẩu :</th>
                        <th>*******</th>
                    </tr>
                    <tr>
                        <th>Chỉnh sửa tài khoản</th>
                        <th colspan="2"><a href="chinhsuataikhoan.php"><input type="submit" value="Chỉnh sửa" class="btn-dark"></a></th>
                    </tr>
                </thead>
                </table>

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

