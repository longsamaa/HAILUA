<?php require_once __DIR__."/Header.php" ?>
<?php  require_once  __DIR__."/Footer.php"?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--                    <a href="#">Dashboard</a>-->
                <b>Tất cả các giao dịch trên web</b>
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="row">
            <label class="card-title"><b>Giao dịch của HAILUA.COM</b></label>
            <?php
                $hoadonadmin = loadtatcahoadonadmin();
                $num = mysqli_num_rows($hoadonadmin);
                if($num == 0){
                    echo "<p>Không có hóa đơn</p>";
                }
            ?>
            <?php
                if($num != 0) {
            ?>
                    <table class="table table-hover">
                        <thread>
                            <tr>
                                <th>Mã giao dịch</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên người mua</th>
                                <th>Số điện thoại người mua</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thread>

                        <?php
                        while($rshoadon = mysqli_fetch_array($hoadonadmin,MYSQLI_ASSOC)){
                            ?>
                            <tbody>
                            <td><?php echo $rshoadon['id']; ?></td>
                            <td><?php echo $rshoadon['idsanpham'] ?></td>
                            <td><?php echo $rshoadon['tennguoimua']; ?></td>
                            <td><?php echo $rshoadon['sodienthoainguoimua']; ?></td>
                            <td><?php echo $rshoadon['tensanpham']; ?></td>
                            <td><?php echo $rshoadon['soluong']; ?></td>
                            <td><?php echo $rshoadon['thanhtien']; ?></td>
                            </tbody>
                        <?php } ?>
                    </table>
            <?php } ?>
            <label><b>Tất cả các giao dịch của người dùng</b></label>
            <?php
            $hoadonnguoidung = loadtatcahoadonnguoidung();
            $num1 = mysqli_num_rows($hoadonnguoidung);
            if($num1 == 0){
                echo "<p>Không có hóa đơn</p>";
            }
            ?>
            <?php
            if($num1 != 0) {
                ?>
                <table class="table table-hover">
                    <thread>
                        <tr>
                            <th>Mã giao dịch</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên người mua</th>
                            <th>Số điện thoại người mua</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Tên người bán</th>
                            <th>Số điện thoại người bán</th>
                            <th>Mã id người bán</th>
                        </tr>
                    </thread>

                    <?php
                    while($rshoadon = mysqli_fetch_array($hoadonnguoidung,MYSQLI_ASSOC)){
                        ?>
                        <tbody>
                        <td><?php echo $rshoadon['id']; ?></td>
                        <td><?php echo $rshoadon['idsanpham'] ?></td>
                        <td><?php echo $rshoadon['tennguoimua']; ?></td>
                        <td><?php echo $rshoadon['sodienthoainguoimua']; ?></td>
                        <td><?php echo $rshoadon['tensanpham']; ?></td>
                        <td><?php echo $rshoadon['soluong']; ?></td>
                        <td><?php echo $rshoadon['thanhtien']; ?></td>
                        <?php
                            $idnguoidung = $rshoadon['idnguoidung'];
                            $nguoiban = loadtaikhoannguoidungID($idnguoidung);
                        ?>
                        <td><?php echo $nguoiban['hoten'];  ?></td>
                        <td><?php echo $nguoiban['sodienthoai']; ?></td>
                        <td><?php echo $nguoiban['id']; ?></td>
                        </tbody>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © By Boobstrap 2018</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
