<?php require_once __DIR__."/Header.php" ?>
<?php  require_once  __DIR__."/Footer.php"?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--                    <a href="#">Dashboard</a>-->
                Quản lý tài khoản
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã người dùng</th>
                        <th>Tên tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Khóa tài khoản</th>
                        <th>Mở tài khoản</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $nguoidung = loadtaikhoannguoidung();
                while($rs = mysqli_fetch_array($nguoidung,MYSQLI_ASSOC)){
                    $idtaikhoankhoa = $rs['id'];
                    $taikhoankhoa = loadtaikhoankhoaID($idtaikhoankhoa);
                    $num = mysqli_num_rows($taikhoankhoa);
                    ?>
                    <tr>
                        <td><?php echo $rs['id']; ?></td>
                        <td><?php echo $rs['taikhoan'];?></td>
                        <td><?php echo $rs['matkhau'];?></td>
                        <td><?php echo $rs['hoten'];?></td>
                        <td><?php echo $rs['sodienthoai'];?></td>
                        <?php if ($num == 0) {?>
                        <td><a href="admin_khoataikhoan.php?id=<?php echo $rs['id']; ?>"><img src="iconkhoa.jpg" width="30px" height="30px" class="img-thumbnail"></a></td>
                        <?php } ?>
                        <?php if ($num != 0) { ?>
                        <td>Tài khoản đã bị khóa</td>
                        <?php } ?>
                        <td><a href="admin_motaikhoan.php?id=<?php echo $rs['id']; ?>"><img src="iconmo.png" width="30px" height="30px" class="img-thumbnail"></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
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
