<?php require_once __DIR__."/Header.php" ?>
<?php  require_once  __DIR__."/Footer.php"?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--                    <a href="#">Dashboard</a>-->
                Trang quản lý hóa đơn <?php echo $Admin->gethoten();?>
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <?php
            $hanghoaadmin = loadhoadonAdmin();
            $num = mysqli_num_rows($hanghoaadmin);
            if ($num == 0)
            {
                echo "<p>Không có hóa đơn nào cả</p>";
            }
        ?>
        <div class="mx-auto">
        <?php
            if ($num != 0) {
        ?>
                <table class="table table-hover">
                    <thread>
                        <tr>
                            <th>Mã giao dịch</th>
                            <th>Tên người mua</th>
                            <th>Số điện thoại người mua</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thread>
                    <?php
                    while($rshoadon = mysqli_fetch_array($hanghoaadmin,MYSQLI_ASSOC)){
                        ?>
                        <tbody>
                        <td><?php echo $rshoadon['id']; ?></td>
                        <td><?php echo $rshoadon['tennguoimua']; ?></td>
                        <td><?php echo $rshoadon['sodienthoainguoimua']; ?></td>
                        <td><?php echo $rshoadon['tensanpham']; ?></td>
                        <td><?php echo $rshoadon['soluong']; ?></td>
                        <td><?php echo $rshoadon['thanhtien']; ?>.000</td>
                        <td><a onclick="return confirm('Bạn có muốn xóa không ?');" href="xoagiaodichadmin.php?id=<?php echo $rshoadon['id']; ?>"><img src="../hinhanhweb/iconxoa.png" width="30px" height="30px" class="img-thumbnail"></a></td>
                        </tbody>
                    <?php } ?>
                    </tbody>
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
