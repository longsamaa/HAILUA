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
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $Hanghoa = loadhanghoaID($id);
                    if($Hanghoa['idadminh'] != 0){
                        $tmp = 0;
                    }
                    else{
                        $tmp = 1;
                        $idNguoidung = $Hanghoa['idnguoidung'];
                        $tknguoidung = loadtaikhoannguoidungID($idNguoidung);
                    }
                }
            ?>
            <h1>Chi tiết sản phẩm</h1>
            <div class="row">
            <img src="<?php  echo $Hanghoa['anhminhhoa']; ?>" width="500px" height="500px" class="sanpham_img_id<?php echo $Hanghoa['id'];?>" id="<?php echo $Hanghoa['id'];?>" >
                <div class="col">
                    <div class="d-lg-table-row">
                        <h4 class="card-title">Tên người đăng</h4>
                        <?php if($tmp == 0) { ?>
                        <p>Đây là sản phẩm của shop HAILUA.COM</p>
                        <h4 class="card-title">Số điện thoại</h4>
                        <p>01234567</p>
                        <?php } ?>
                        <?php if($tmp != 0) { ?>
                            <p><?php echo $tknguoidung['hoten']; ?></p>
                            <h4 class="card-title">Số điện thoại người đăng</h4>
                            <p><?php echo $tknguoidung['sodienthoai']; ?></p>
                        <?php } ?>
                        <h4 class="card-title">Tên sản phẩm</h4>
                        <p class="mb-auto"><?php echo $Hanghoa['tensanpham']; ?></p>
                        <h4 class="card-title">Giá sản phẩm</h4>
                        <p class="mb-auto"><?php echo $Hanghoa['giasanpham']; ?></p>
                        <h4 class="card-title">Mô tả</h4>
                        <p class="mb-auto">Không có mô tả nào</p>
                        <?php echo '</br>'; ?>
                        <a  id="addcart<?php echo $Hanghoa['id']; ?>"><input type="submit" value="Thêm vào giỏ" class="btn btn-dark"></a>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#addcart<?php echo $Hanghoa['id']; ?>").click(function () {
                            var id = $(".sanpham_img_id<?php echo $Hanghoa['id'];?>").attr('id');
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

            </div>
            <div class="col">
            <label><h4>Bình luận</h4></label>

            <?php
                $binhluan = loadbinhluanid($id);
                $num = mysqli_num_rows($binhluan);
                if($num == 0){
                    echo "<p>Không có bình luận</p>";
                }
            ?>

                <?php
                  if($num != 0){
                      while ($rs = mysqli_fetch_array($binhluan)){
                            $idtaikhoan = $rs['idnguoibinhluan'];
                            $nguoidang = loadtaikhoannguoidungID($idtaikhoan);
                          ?>
                          <table class="table table-hover">
                              <tr>
                                  <th style="color: #005cbf"><?php echo $nguoidang['hoten']; ?></th>
                              </tr>
                              <tr>
                                  <th><?php echo $rs['binhluan']; ?></th>
                                  <?php if ($bienNguoidung != 0) { ?>
                                  <?php if($nguoidang['id'] == $Nguoidung->getID() && $bienNguoidung != 0) { ?>
                                    <th><a href="xoabinhluannguoidung.php?id=<?php echo $rs['id']; ?>"><img src="../hinhanhweb/iconxoa.png" width="30px" height="30px" class="img-thumbnail"></a></th>
                                  <?php } ?>
                              <?php } ?>
                              </tr>
                          </table>
                <?php
                      }
                  }
                ?>
            </div>
            <!-- /.col-lg-9 -->

            <?php
                if(isset($_POST['dangbinhluan'])){
                    if(isset($_POST['binhluan'])){
                        $idnguoidang = $Nguoidung->getID();
                        $binhluan = $_POST['binhluan'];
                        $sql = mysqli_connect("localhost","root","","hailua.com");
                        mysqli_set_charset($sql,"utf8");
                        $query = "INSERT INTO binhluan(idnguoibinhluan,idsanpham,binhluan)
                                              VALUES ('$idnguoidang','$id','$binhluan')";
                        $result = mysqli_query($sql,$query);
                        kt_query($result,$query,$sql);
                        $trang = "location:trangchitietsanpham.php?id=";
                        $loadlai = $trang.$id;
                        header($loadlai);
                    }
                }
            ?>

            <?php if($bienNguoidung != 0)
            {
                ?>
            <div class="col">
                <form method="post">
                <input type="text" name="binhluan" class="form-control" placeholder="Bình luận">
                <?php echo "</br>"?>
                <input type="submit" name="dangbinhluan" class="btn-dark" value="Đăng bình luận">
                </form>
            </div>
            <?php } ?>
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

